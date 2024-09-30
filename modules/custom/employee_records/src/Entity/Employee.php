<?php

namespace Drupal\employee_records\Entity;

use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\user\EntityOwnerTrait;

/**
 * Defines the Employee entity.
 *
 * @ContentEntityType(
 *   id = "employee",
 *   label = @Translation("Employee"),
 *   base_table = "employee",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name"
 *   },
 *   handlers = {
 *     "list_builder" = "Drupal\employee_records\Controller\EmployeeListBuilder",
 *     "form" = {
 *       "add" = "Drupal\employee_records\Form\EmployeeForm",
 *       "edit" = "Drupal\employee_records\Form\EmployeeForm",
 *       "delete" = "Drupal\employee_records\Form\EmployeeDeleteForm"
 *     }
 *   },
 *   admin_permission = "administer employee entities",
 *   links = {
 *     "canonical" = "/employee/{employee}",
 *     "add-form" = "/admin/employee/add",
 *     "edit-form" = "/admin/employee/{employee}/edit",
 *     "delete-form" = "/admin/employee/{employee}/delete",
 *     "collection" = "/admin/employee"
 *   }
 * )
 */

class Employee extends ContentEntityBase {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    // Employee Name
    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setRequired(true)
      ->setSettings([
        'max_length' => 255,
      ]);

    // Email
    $fields['email'] = BaseFieldDefinition::create('email')
      ->setLabel(t('Email'))
      ->setRequired(true);

    // Gender
    $fields['gender'] = BaseFieldDefinition::create('list_string')
      ->setLabel(t('Gender'))
      ->setRequired(true)
      ->setSettings([
        'allowed_values' => [
          'male' => 'Male',
          'female' => 'Female',
        ]
      ]);

    // Job Title
    $fields['job_title'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Job Title'))
      ->setRequired(true);

    // Department
    $fields['department'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Department'));

    // Mobile
    $fields['mobile'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Mobile'))
      ->setRequired(true);

    // Address
    $fields['address'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Address'));

    // Zipcode
    $fields['zipcode'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Zipcode'));

    return $fields;
  }

}
