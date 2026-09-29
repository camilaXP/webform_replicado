<?php

namespace Drupal\webform_replicado\Plugin\WebformElement;

use Drupal\webform\Plugin\WebformElement\TextField;

/**
 * Provides a 'numero_docente' Webform element.
 *
 * @WebformElement(
 *   id = "numero_docente",
 *   label = @Translation("Número de Docente"),
 *   category = @Translation("USP")
 * )
 */
class NumDocenteElement extends TextField {
}