<?php
namespace Drupal\form_api\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;
use Drupal\Core\Database\Database;
class formregistration extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'formregistration';
  }
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('First Name:'),
      '#required' => TRUE,
    );
    $form['last_name'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#required' => TRUE,
    );
    $form['bio'] = array (
      '#type' => 'textfield',
      '#title' => $this->t('Bio'),
      '#required' => TRUE,
    );
    $form['gender'] = array(
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options' => array('Male' => 'Male', 'Female' => 'Female'),
      '#required' => TRUE,
      );
      $databaseconnection = \Drupal::database();//select the database and help in executing the queries
      $selecttaxonomy = $databaseconnection->query("SELECT tid,name FROM taxonomy_term_field_data WHERE vid = 'interest' ");//help in selecting the taxnomy where vid is intrest
      $getalldata = $selecttaxonomy->fetchAll();//help in get all data from taxnomy
        $x=array();$y=array();$z=array();$increment=0;// empty array
        foreach($getalldata  as $key=>$value){
          array_push($x,$getalldata[$increment]->tid);//pushing  key in x array
          array_push($y,$getalldata[$increment]->name);// pushing value in y array
          $increment++;
        }
        $z=array_combine($x,$y);// combining two array
        $form['interest'] = array(
        '#type' => 'select',
        '#title' => $this->t('select your intrest'),
        '#options' =>$z,
        '#required' => TRUE,
        );

    $form['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Submitted'),
      '#ajax' => [
        'callback' => '::ajaxcall',
      ],
    );
    return $form;
  }
  public function ajaxcall(array $form, FormStateInterface $form_state) {
    $response = new AjaxResponse();
    $conn = Database::getConnection();
    $conn->insert('registration')->fields(
      array(
        'first_name' => $form_state->getValue('first_name'),
        'last_name' => $form_state->getValue('last_name'),
        'bio' => $form_state->getValue('bio'),
        'gender' => $form_state->getValue('gender'),
        'interest' => $form_state->getValue('interest'),
      )
    )->execute();
    drupal_set_message("form submitted successfully");
        return $response;

       }
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $conn = Database::getConnection();
    $conn->insert('registration')->fields(
      array(
        'first_name' => $form_state->getValue('first_name'),
        'last_name' => $form_state->getValue('last_name'),
        'bio' => $form_state->getValue('bio'),
        'gender' => $form_state->getValue('gender'),
        'interest' => $form_state->getValue('interest'),
      )
    )->execute();
    drupal_set_message("form submitted successfully");
    //$url = Url::fromRoute('form_api.thankyou');
    //$form_state->setRedirectUrl($url);
    }
  }
