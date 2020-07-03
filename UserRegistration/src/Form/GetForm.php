<?php
namespace Drupal\UserRegistration\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Database\Database;
use Drupal\user\Entity\User;
use Drupal\user\Entity\Query\QueryInterface;

class GetForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'otherdetails';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['bio'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Bio'),
      '#required' => TRUE,
    ];
    $form['gender'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options' => array('Male' => 'Male', 'Female' => 'Female'),
      '#required' => TRUE,
      );
    $form['interest'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Intrest'),
      '#required' => TRUE,
    ];
    $form['actions'] = [
      '#type' => 'actions',
      'submit' => [
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
      ],
    ];

    return $form;
  }
    public function submitForm(array &$form, FormStateInterface $form_state) {
      $user = \Drupal\user\Entity\User::load(\Drupal::currentUser()->id());
      $name = $user->get('name')->value;
      $conn = Database::getConnection();
      $conn->insert('otherdetails')->fields(
        array(
          'name'=>$name,
          'bio' => $form_state->getValue('bio'),
          'gender' => $form_state->getValue('gender'),
          'interest' => $form_state->getValue('interest'),
        )
      )->execute();
      drupal_set_message("Detail Submitted Successfully");
  }
}
