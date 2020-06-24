<?php
namespace Drupal\studentform\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class studentregistrationform extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'studentform';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['student_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Student Name:'),
      '#required' => TRUE,
    );
    $form['roll_number'] = array (
      '#type' => 'tel',
      '#title' => $this->t('Roll No:'),
    );
    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    );
    return $form;
  }
  public function submitForm(array &$form, FormStateInterface $form_state) {
     foreach ($form_state->getValues() as $key => $value) {
       drupal_set_message($key . ': ' . $value);
     }
    }
  }

