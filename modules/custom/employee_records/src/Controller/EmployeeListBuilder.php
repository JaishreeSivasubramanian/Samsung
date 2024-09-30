<?php

namespace Drupal\employee_records\Controller;

use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Employee entities.
 */
class EmployeeListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['name'] = $this->t('Name');
    $header['email'] = $this->t('Email');
    $header['operations'] = $this->t('Operations');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /** @var \Drupal\employee_records\Entity\Employee $entity */
    $row['name'] = Link::fromTextAndUrl($entity->label(), $entity->toUrl('edit-form'));
    $row['email'] = $entity->get('email')->value;

    // Add operations for edit and delete links.
    $row['operations'] = [
      'edit' => Link::fromTextAndUrl($this->t('Edit'), $entity->toUrl('edit-form')),
      'delete' => Link::fromTextAndUrl($this->t('Delete'), $entity->toUrl('delete-form')),
    ];

    return $row + parent::buildRow($entity);
  }

  /**
   * {@inheritdoc}
   */
  public function render() {
    // Get the parent render array and add a pager.
    $build = parent::render();
    $build['pager'] = [
      '#type' => 'pager',
    ];
    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    // Use the parent build method to render the entity list.
    return parent::build();
  }
}
