<?php
namespace Drupal\customeform\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class formcreated extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'customeform';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['user_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('User Name:'),
      '#required' => TRUE,
    );
    $form['user_mail'] = array(
      '#type' => 'email',
      '#title' => $this->t('Email ID:'),
      '#required' => TRUE,
    );
    $form['user_password'] = array (
      '#type' => 'password',
      '#title' => $this->t('Password:'),
      '#required' => TRUE,
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submit Form'),
    );
    return $form;
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {
     foreach ($form_state->getValues() as $key => $value) {
       drupal_set_message($key . ': ' . $value);
     }
    }
  }

