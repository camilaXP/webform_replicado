<?php

namespace Drupal\webform_replicado\Element;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Textfield;



/**
 * Provides a post element.
 *
 * @FormElement("pos_grad")
 */


class PosGradElement extends Textfield {

  public function getInfo(): array {
    $class = get_class($this);
    return parent::getInfo() + [
      '#input' => TRUE,
      '#element_validate' => [
        [$class, 'validatePosGrad'],
      ],
    ];
  }



public static function validatePosGrad(&$element, FormStateInterface $form_state, &$complete_form): void {
    
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
 
 $programas = [
   'antropologia social',
   'ciencia politica',
   'estudos comparados de literaturas de linguas portuguesa',
   'estudos linguisticos e literarios em ingles',
   'filologia e lingua portuguesa',
   'filosofia',
   'geografia fisica',
   'geografia humana',
   'historia economica',
   'historia social',
   'humanidades, direitos e outras legitimidades',
   'letras classicas',
   'letras estrangeiras e traducao',
   'letra',
   'lingua e literartura alema',
   'lingua espanhola e literaturas espanhola e hispano-americana',
   'lingua, literatura e cultura italianas',
   'lingua, literatura e cultura japonesas',
   'linguistica',
   'literatura brasileira',
   'literatura portuguesa',
   'mestrado profissional em letras em rede nacional',
   'profletras',
   'sociologia',
   'teoria literaria e literatura comparada',
 ];

 $valido = FALSE;

  foreach ($programas as $programa) {
    if (str_contains($value, $programa)) {
      $valido = TRUE;
      break;
    }
  }

  if (!$valido) {
    $form_state->setError(
      $element,
      t('Esse programa não consta na Pós-Graduação.')
    );
  }
  }
}  
