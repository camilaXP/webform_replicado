<?php

namespace Drupal\webform_replicado\Element;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element\Textfield;



/**
 * Provides a language element.
 *
 * @FormElement("habilitacao_letras")
 */


class HabilitacaoElement extends Textfield {

  public function getInfo(): array {
    $class = get_class($this);
    return parent::getInfo() + [
      '#input' => TRUE,
      '#element_validate' => [
        [$class, 'validateHabilitacao'],
      ],
    ];
  }


public static function validateHabilitacao(&$element, FormStateInterface $form_state, &$complete_form): void {
    
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

 $habilitacoes = [
  'portugues',
  'grego',
  'latim',
  'alemao',
  'espanhol',
  'frances',
  'ingles',
  'italiano',
  'arabe',
  'armenio',
  'chines',
  'coreano',
  'hebraico',
  'japones',
  'russo',
  'linguistica',
];

$valido = FALSE;

  foreach ($habilitacoes as $habilitacao) {
    if (str_contains($value, $habilitacao)) {
      $valido = TRUE;
      break;
    }
  }

  if (!$valido) {
    $form_state->setError(
      $element,
      t('Essa habilitação não consta.')
    );
  }
 }  
}