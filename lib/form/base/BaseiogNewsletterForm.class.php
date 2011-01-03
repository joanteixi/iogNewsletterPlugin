<?php

/**
 * iogNewsletter form base class.
 *
 * @method iogNewsletter getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseiogNewsletterForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'numero'                   => new sfWidgetFormInputText(),
      'data_publicacio'          => new sfWidgetFormDateTime(),
      'titular'                  => new sfWidgetFormInputText(),
      'template_id'              => new sfWidgetFormPropelChoice(array('model' => 'IogNewsletterTemplate', 'add_empty' => false)),
      'send_date'                => new sfWidgetFormDateTime(),
      'iog_newsletter_llista_id' => new sfWidgetFormPropelChoice(array('model' => 'IogNewsletterLlista', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'numero'                   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647, 'required' => false)),
      'data_publicacio'          => new sfValidatorDateTime(array('required' => false)),
      'titular'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'template_id'              => new sfValidatorPropelChoice(array('model' => 'IogNewsletterTemplate', 'column' => 'id')),
      'send_date'                => new sfValidatorDateTime(array('required' => false)),
      'iog_newsletter_llista_id' => new sfValidatorPropelChoice(array('model' => 'IogNewsletterLlista', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'iogNewsletter';
  }


}
