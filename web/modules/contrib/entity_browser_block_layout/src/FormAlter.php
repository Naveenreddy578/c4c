<?php

namespace Drupal\entity_browser_block_layout;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\DependencyInjection\DependencySerializationTrait;
use Drupal\Core\Entity\EntityDisplayRepositoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\Routing\RedirectDestination;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslationInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Implementation callbacks for form alter hooks.
 */
class FormAlter implements ContainerInjectionInterface {

  use StringTranslationTrait;
  use DependencySerializationTrait;

  /**
   * The form element name for storing layout builder view modes.
   */
  const VIEW_MODES_SETTING = 'entity_browser_block_layout_view_modes';

  /**
   * The fallback view modes available to Layout Builder Entity Browser items.
   */
  const DEFAULT_VIEW_MODES = [
    'default',
  ];

  /**
   * The preferred view modes to use as defaults, if available.
   */
  const PREFERRED_VIEW_MODES = [
    'teaser',
    'promo',
  ];

  /**
   * FormAlter constructor.
   *
   * @param \Drupal\Core\Entity\EntityDisplayRepositoryInterface $entityDisplayRepo
   *   The entity_display.repository service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entityTypeManager
   *   The entity_type.manager service.
   * @param \Drupal\Core\Routing\RedirectDestination $routerDestination
   *   The redirect.destination service.
   * @param \Drupal\Core\Render\RendererInterface $renderer
   *   The renderer service.
   * @param \Drupal\Core\StringTranslation\TranslationInterface $string_translation
   *   The string_translation service.
   */
  protected function __construct(
    protected EntityDisplayRepositoryInterface $entityDisplayRepo,
    protected EntityTypeManagerInterface $entityTypeManager,
    protected RedirectDestination $routerDestination,
    protected RendererInterface $renderer,
    TranslationInterface $string_translation,
  ) {
    $this->stringTranslation = $string_translation;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('entity_display.repository'),
      $container->get('entity_type.manager'),
      $container->get('redirect.destination'),
      $container->get('renderer'),
      $container->get('string_translation'),
    );
  }

  /**
   * Alters the layout builder "update block configuration" form.
   *
   * @see hook_form_alter()
   * @see entity_browser_block_form_layout_builder_update_block_alter()
   */
  public function alterLayoutBuilderUpdateBlockForm(&$form, FormStateInterface $form_state, $form_id) {
    $settings = &$form['settings'];

    // Only trying to alter the values for Entity Browser Block blocks.
    if ($settings['provider']['#value'] != 'entity_browser_block') {
      return;
    }

    // Hide labels and titles, the selected entities will have their own titles.
    $settings['admin_label']['#access'] = FALSE;
    $settings['label_display']['#value'] = FALSE;
    $settings['label_display']['#access'] = FALSE;
    $settings['label']['#access'] = FALSE;

    // Change some settings for the tiny results table.
    $settings['selection']['table']['#empty'] = $this->t('No content selected yet.');
    unset($settings['selection']['table']['#tabledrag']);

    // Add a process callback to adjust the available view modes.
    $settings['selection']['table']['#process'][] = [$this, 'filterViewModes'];

    // Add custom css.
    $form['#attached']['library'][] = 'entity_browser_block_layout/eb_layout_panel';

  }

  /**
   * Alters the layout builder "add block" form.
   *
   * @see hook_form_alter()
   * @see entity_browser_block_form_layout_builder_add_block_alter()
   */
  public function alterLayoutBuilderAddBlockForm(&$form, FormStateInterface $form_state, $form_id) {

    // Apply all the same changes as on the update form.
    $this->alterLayoutBuilderUpdateBlockForm($form, $form_state, $form_id);

    // Ask Entity Browser to auto-open only when creating new blocks to avoid
    // need to click multiple times to select content in Layout Builder.
    // Requires a patch to Entity Browser:
    // https://www.drupal.org/files/issues/2018-10-23/entity_browser-prevent-auto-open-infinite-loop-3008700-2.patch
    $form['settings']['selection']['entity_browser']['#process'][] = [
      $this,
      'autoOpenModal',
    ];

  }

  /**
   * Implements callback_form_element_process().
   *
   * Hides the open modal link/button from the EB element when there is an
   * existing default value or the user just selected something and the form is
   * rebuilding.
   *
   * @see alterLayoutBuilderAddBlockForm()
   */
  public function hideOpenBrowserButton(&$entity_browser_display, FormStateInterface $form_state, &$complete_form) {
    $user_input = $form_state->getUserInput();
    // If the form is rebuilding after the user clicked "Remove", we don't want
    // to hide the button that will let them open the modal again.
    if (!empty($user_input['_triggering_element_value']) && $user_input['_triggering_element_value'] === 'Remove') {
      return $entity_browser_display;
    }
    $has_selection = !empty($user_input['settings']['selection']['entity_browser']['entity_ids']);
    $has_default = !empty($entity_browser_display['entity_ids']['#default_value']);
    if ($has_default || $has_selection) {
      $entity_browser_display['entity_browser']['open_modal']['#access'] = FALSE;
    }
    return $entity_browser_display;
  }

  /**
   * Implements callback_form_element_process().
   *
   * Triggers the Entity Browser display to automatically open.
   *
   * @see alterLayoutBuilderAddBlockForm()
   */
  public function autoOpenModal(&$entity_browser_display, FormStateInterface $form_state, &$complete_form) {
    $modal = &$entity_browser_display['entity_browser']['open_modal'];
    $uuid = $modal['#attributes']['data-uuid'] ?? NULL;
    $modal['#attached']['drupalSettings']['entity_browser']['modal'][$uuid]['auto_open'] = TRUE;
    return $entity_browser_display;
  }

  /**
   * Implements callback_form_element_process().
   *
   * Filters the view modes available to Entity Browser items.
   *
   * @see alterLayoutBuilderUpdateBlockForm()
   */
  public function filterViewModes(&$table, FormStateInterface $form_state, &$complete_form) {

    // Filter view modes for each entity selected by the browser based on the
    // entity_browser_block third-party-settings for the entity's bundle.
    foreach (Element::children($table) as $row) {

      // Get the entity information for this row.
      [$entity_type, $entity_id] = explode(':', $row);

      // Make sure the entity type is valid.
      $entity_storage = $this
        ->entityTypeManager
        ->getStorage($entity_type);
      if ($entity_storage) {

        // Make sure the entity ID is valid.
        $entity = $entity_storage->load($entity_id);
        if ($entity) {

          // Get all the "allowed view modes" for this entity's bundle.
          $bundle_entity_type = $entity
            ->getEntityType()
            ->getBundleEntityType();
          $bundle = $this
            ->entityTypeManager
            ->getStorage($bundle_entity_type)
            ->load($entity->bundle());
          $allowed_view_modes = array_filter($bundle
            ->getThirdPartySetting('entity_browser_block_layout',
              static::VIEW_MODES_SETTING, static::DEFAULT_VIEW_MODES));

          // Filter out the disallowed view modes.
          $view_mode = &$table[$row]['view_mode'];
          $view_mode['#options'] = array_filter($view_mode['#options'],
            function ($view_mode_option) use ($allowed_view_modes) {
              return in_array($view_mode_option, $allowed_view_modes);
            }, ARRAY_FILTER_USE_KEY);

          // See if a preferred view mode is available in the allowed list.
          $preferred = array_intersect($allowed_view_modes, static::PREFERRED_VIEW_MODES);
          $default_value = !empty($preferred) ? reset($preferred) : 'default';
          $view_mode['#default_value']
            = $view_mode['#default_value'] ?? $default_value;

          // Get the path to the parent of this table.
          $destination = $this->routerDestination->get();

          // If we haven't finished creating the block, the destination will
          // not be an node edit path, but a path to add/block. That means it's
          // too early to edit the referenced content, since the new block will
          // not be preserved while we go off to edit the other content. Only
          // provide an edit button if we're not in the process of adding a
          // new block.
          if (strpos($destination, '/layout_builder/add/block') === FALSE) {
            $options = [
              'query' => ['destination' => $destination],
              'attributes' => [
                'class' => ['button'],
              ],
            ];
            $link = $entity->toLink('Edit', 'edit-form', $options)->toRenderable();
            // Add an "Edit" button before remove button.
            $table[$row]['operations']['remove']['#prefix'] = $this->renderer->render($link);
          }

        }
      }
    }
    return $table;
  }

  /**
   * Adds custom third-party settings to the node type add/edit form.
   *
   * @see hook_form_alter()
   * @see entity_browser_block_form_node_type_edit_form_alter()
   * @see entity_browser_block_form_node_type_add_form_alter()
   */
  public function alterEntityTypeForm($entity_type, &$form, FormStateInterface $form_state, $form_id) {

    // Get the currently selected view modes.
    $current_selections = $form_state
      ->getFormObject()
      ->getEntity()
      ->getThirdPartySetting('entity_browser_block_layout',
        static::VIEW_MODES_SETTING, static::DEFAULT_VIEW_MODES);

    // Get the list of all view modes for this entity type.
    $all_view_modes = $this
      ->entityDisplayRepo
      ->getViewModeOptions($entity_type);

    // Add checkboxes for selecting "view modes allowed in layout builder".
    $form['entity_browser_block_layout'] = [
      '#type' => 'details',
      '#title' => 'Entity Browser Block view modes',
      '#group' => 'additional_settings',
      static::VIEW_MODES_SETTING => [
        '#type' => 'checkboxes',
        '#description' => $this->t('Select the view modes that shall be available to editors placing Entity Browser Block content of this type in Layout Builder.'),
        '#default_value' => $current_selections,
        '#options' => $all_view_modes,
      ],
    ];

    // Add an entity builder callback to save the selections.
    $form['#entity_builders'][] = [$this, 'entityTypeFormBuilder'];
  }

  /**
   * Entity builder callback: Saves the Layout Builder view mode selections.
   *
   * @see alterEntityTypeForm()
   */
  public function entityTypeFormBuilder($entity_type, $config_entity, &$form, FormStateInterface $form_state) {
    $view_modes = $form_state->getValue(static::VIEW_MODES_SETTING);
    if ($view_modes) {
      $config_entity->setThirdPartySetting(
        'entity_browser_block_layout', static::VIEW_MODES_SETTING, $view_modes);
    }
    else {
      $config_entity->unsetThirdPartySetting(
        'entity_browser_block_layout', static::VIEW_MODES_SETTING);
    }
  }

}
