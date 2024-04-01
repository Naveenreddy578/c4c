<?php

namespace Drupal\layout_builder_sections_config\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * The Layout Builder Sections Config settings form class.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'layout_builder_sections_config_settings_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['layout_builder_sections_config.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('layout_builder_sections_config.settings');

    $description = '<p>' . $this->t('The possible values this field can contain. Enter one value per line, in the format key|label.') . '</p>';

    $form['title_wrappers'] = [
      '#type' => 'textarea',
      '#title' => $this->t('HTML wrappers - (HTML tag|Label)'),
      '#description' => $description
        . '<p>' . $this->t('<strong>Example:</strong>')
        . '<br/>' . $this->t('h1|H1')
        . '<br/>' . $this->t('h2|H2')
        . '<br/>' . $this->t('h3|H3')
        . '<br/>' . $this->t('h4|H4')
        . '<br/>' . $this->t('h5|H5')
        . '<br/>' . $this->t('h6|H6')
        . '</p>',
      '#default_value' => $config->get('title_wrappers') ?? '',
    ];

    $form['title_positions'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Position options - (Style Name|Label)'),
      '#description' => $description
      . '<p>' . $this->t('<strong>Example:</strong>')
      . '<br/>' . $this->t('section-left-title|Left')
      . '<br/>' . $this->t('section-center-title|Center')
      . '<br/>' . $this->t('section-right-title|Right')
      . '</p>',
      '#default_value' => $config->get('title_positions') ?? '',
    ];

    $form['title_colors'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Colors options - (Style Name|Label)'),
      '#description' => $description
      . '<p>' . $this->t('<strong>Example:</strong>')
      . '<br/>' . $this->t('section-black-title|Black')
      . '<br/>' . $this->t('section-white-title|White')
      . '<br/>' . $this->t('section-blue-title|Blue')
      . '</p>',
      '#default_value' => $config->get('title_colors') ?? '',
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('layout_builder_sections_config.settings')
      ->set('title_positions', $form_state->getValue('title_positions'))
      ->set('title_colors', $form_state->getValue('title_colors'))
      ->set('title_wrappers', $form_state->getValue('title_wrappers'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
