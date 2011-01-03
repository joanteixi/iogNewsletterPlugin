<?php

/**
 * IogNewsletterLlista form base class.
 *
 * @method IogNewsletterLlista getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIogNewsletterLlistaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom' => new sfWidgetFormInputText(),
      'id'  => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'nom' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_llista[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IogNewsletterLlista';
  }


}
