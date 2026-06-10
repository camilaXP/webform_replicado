<?php

namespace Drupal\webform_replicado\Element;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Textfield;



/**
 * Provides a department element.
 *
 * @FormElement("departamentos_fflch")
 */


class DepartamentosElement extends Textfield {

  public function getInfo(): array {
    $class = get_class($this);
    return parent::getInfo() + [
      '#input' => TRUE,
      '#element_validate' => [
        [$class, 'validateDepartamentos'],
      ],
    ];
  }





public static function validateDepartamentos(&$element, FormStateInterface $form_state, &$complete_form): void {
    
 $value = $element['#value'];

 $value = mb_strtolower($element['#value'], 'UTF-8');

 $value = strtr($value, [
  'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a',
  'é' => 'e', 'ê' => 'e',
  'í' => 'i',
  'ó' => 'o', 'ô' => 'o', 'õ' => 'o',
  'ú' => 'u',
  'ç' => 'c',
 ]);

 $departamentos = [
  'departamento de antropologia',
  'departamento de ciencia politica',
  'departamento de filosofia',
  'departamento de geografia',
  'departamento de historia',
  'departamento de letras classicas e vernaculas',
  'departamento de letras modernas',
  'departamento de letras orientais',
  'departamento de linguistica',
  'departamento de sociologia',
  'departamento de teoria literaria e literatura comparada',
  'antropologia',
  'ciencia politica',
  'filosofia',
  'geografia',
  'historia',
  'letras classicas e vernaculas',
  'letras modernas',
  'letras orientais',
  'linguistica',
  'sociologia',
  'teoria literaria e literatura comparada',  
  'fla',
  'flp',
  'flf',
  'flg',
  'flh',
  'flc',
  'flm',
  'flo',
  'fll',
  'fsl',
  'flt',
 ];

$valido = FALSE;

  foreach ($departamentos as $departamento) {
    if (str_contains($value, $departamento)) {
      $valido = TRUE;
      break;
    }
  }

  if (!$valido) {
    $form_state->setError(
      $element,
      t('Esse departamento não é da FFLCH.')
    );
  }
  }
}  
 
  