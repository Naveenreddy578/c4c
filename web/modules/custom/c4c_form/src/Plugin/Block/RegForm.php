<?php
/**
 * @file
 * Contains \Drupal\c4c_form\Plugin\Block\RegForm.
 */

namespace Drupal\c4c_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;

/**
 * Provides a 'Reg form' block.
 *
 * @Block(
 *   id = "reg_form_block",
 *   admin_label = @Translation("Registration Form block"),
 *   category = @Translation("Custom")
 * )
 */
class RegForm extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $form = \Drupal::formBuilder()->getForm('\Drupal\c4c_form\Form\RegistrationForm');

    return $form;
   }
}