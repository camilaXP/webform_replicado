<?php

namespace Drupal\webform_replicado\Element;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Textfield;

/**
 * Provides a USP number element.
 *
 * @FormElement("numero_usp")
 */
class NumeroUspElement extends Textfield {

  public function getInfo(): array {
    $class = get_class($this);

    return parent::getInfo() + [
      '#input' => TRUE,
      '#element_validate' => [
        [$class, 'validateNumeroUsp'],
      ],
    ];
  }

  /**
   * Validates the USP number.
   */
  public static function validateNumeroUsp(
    &$element,
    FormStateInterface $form_state,
    &$complete_form
  ): void {

    $value = str_replace(['.', '-'], '', $element['#value']);

    // Value selected in the Webform Select element.
    $tipo = $form_state->getValue('tipo_de_numero_usp');

    switch ($tipo) {

      case 'intercambista':
        if (strlen($value) != 7) {
          $form_state->setError(
            $element,
            t('O Número USP de intercambista deve possuir 7 dígitos.')
          );
        }
        break;

      case 'docente':
      case 'graduacao':
      case 'pos':
      case 'funcionario':
      default:
        if (strlen($value) != 8) {
          $form_state->setError(
            $element,
            t('O Número USP deve possuir 8 dígitos.')
          );
        }
        break;
    }

  }

}