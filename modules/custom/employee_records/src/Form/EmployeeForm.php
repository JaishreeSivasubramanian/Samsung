<?php

namespace Drupal\employee_records\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for the Employee entity add/edit forms.
 */
class EmployeeForm extends ContentEntityForm {

  /**
   * Builds the form for adding or editing an employee.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);

    // Add any custom form logic here.

    return $form;
  }

  /**
   * Saves the employee entity.
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = $this->entity;
    $status = parent::save($form, $form_state);

    if ($status == SAVED_NEW) {
      $this->messenger()->addMessage($this->t('Employee %name has been added.', ['%name' => $entity->label()]));
    }
    else {
      $this->messenger()->addMessage($this->t('Employee %name has been updated.', ['%name' => $entity->label()]));
    }

    $form_state->setRedirect('entity.employee.collection');
  }

}
