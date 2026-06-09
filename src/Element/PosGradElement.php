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

  if  (
      !str_contains($value, 'Antropologia Social') &&
      !str_contains($value, 'Ciência Política') &&
      !str_contains($value, 'Estudos Comparados de Literaturas de Língua Portuguesa') &&
      !str_contains($value, 'Estudos Linguísticos e Literários em Inglês') &&
      !str_contains($value, 'Filologia e Língua Portuguesa') &&
      !str_contains($value, 'Filosofia') &&
      !str_contains($value, 'Geografia Física') &&
      !str_contains($value, 'Geografia Humana') &&
      !str_contains($value, 'História Econômica') &&
      !str_contains($value, 'História Social') &&
      !str_contains($value, 'Humanidades, Direitos e Outras Legitimidades') &&
      !str_contains($value, 'Letras Clássicas') &&
      !str_contains($value, 'Letras Estrangeiras e Tradução (LETRA)') &&
      !str_contains($value, 'Língua e Literatura Alemã') &&
      !str_contains($value, 'Língua Espanhola e Literaturas Espanhola e Hispano-Americana') &&
      !str_contains($value, 'Língua, Literatura e Cultura Italianas') &&
      !str_contains($value, 'Língua, Literatura e Cultura Japonesa') &&
      !str_contains($value, 'Linguística') &&
      !str_contains($value, 'Literatura Brasileira') &&
      !str_contains($value, 'Literatura Portuguesa') &&
      !str_contains($value, 'Mestrado Profissional em Letras em Rede Nacional (PROFLETRAS)') &&
      !str_contains($value, 'Sociologia') &&
      !str_contains($value, 'Teoria Literária e Literatura Comparada') 
      
    )
   {
    $form_state->setError(
      $element,
      t('Esse programa não faz parte da Pós-Graduação na FFLCH.')
    );
  }
  }
}  
