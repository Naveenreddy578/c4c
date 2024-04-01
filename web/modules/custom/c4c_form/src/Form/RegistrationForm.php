<?php
/**
 * @file
 * Contains \Drupal\customer_registration\Form\RegistrationForm.
 */
namespace Drupal\c4c_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class RegistrationForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'c4c_form_form';
  }
  
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['sample'] = [
    '#type' => 'markup',
    '#markup' => '<div class="c4c-reg-form"><div class="c4c-reg-form-inner">',
    ];
    $form['help'] = [
    '#type' => 'markup',
    '#markup' => '<h2 class="text-center">Try for Free</h2>',
    '#suffix' => '<hr class="hr-class">',
    ];
    $form['help1'] = [
    '#type' => 'markup',
    '#markup' => '<p class="text-center">Sign up for your Zero Cost FinOps as a Service Assessment Workshop</p>',
    ];
    $form['customer_name'] = array(
      '#type' => 'textfield',
      '#prefix' => '<div class="row"><div class="col-md-6">',
      '#attributes' => [
        'placeholder' => t('Name'),
      ],
      '#suffix' => '</div>',
      '#required' => TRUE,
    );
    $form['customer_mail'] = array(
      '#type' => 'email',
      '#prefix' => '<div class="col-md-6">',
      '#attributes' => [
        'placeholder' => t('Email'),
      ],
      '#suffix' => '</div></div>',
      '#required' => TRUE,
    );
    $form['customer_phone'] = array (
      '#type' => 'tel',
      '#prefix' => '<div class="row"><div class="col-md-6">',
      '#attributes' => [
        'placeholder' => t('Phone No.'),
      ],
      '#suffix' => '</div>',
    );
    $form['customer_company'] = array(
    '#type' => 'textfield',
    '#prefix' => '<div class="col-md-6">',
    '#attributes' => [
        'placeholder' => t('Company'),
    ],
    '#suffix' => '</div></div>',
    );

    $form['customer_message'] = array(
    '#type' => 'textfield',
    '#prefix' => '<div class="row"><div class="col-md-12">',
    '#attributes' => [
        'placeholder' => t('Type your message here.'),
    ],
    '#suffix' => '</div></div>',
    );

    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Sign Up'),
      '#button_type' => 'primary',
    );
    $form['sample1'] = [
    '#type' => 'markup',
    '#markup' => '</div></div>',
    ];
    return $form;
  }
  
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addMessage(t("customer Registration Done!! Registered Values are:"));
	foreach ($form_state->getValues() as $key => $value) {
	  \Drupal::messenger()->addMessage($key . ': ' . $value);
    }
  }

}