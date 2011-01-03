<?php

/**
 * iogNewsletterContent form base class.
 *
 * @method iogNewsletterContent getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseiogNewsletterContentForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'newsletter_id' => new sfWidgetFormPropelChoice(array('model' => 'iogNewsletter', 'add_empty' => false)),
      'apartat'       => new sfWidgetFormInputText(),
      'title'         => new sfWidgetFormInputText(),
      'slug'          => new sfWidgetFormInputText(),
      'email_content' => new sfWidgetFormTextarea(),
      'web_content'   => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'newsletter_id' => new sfValidatorPropelChoice(array('model' => 'iogNewsletter', 'column' => 'id')),
      'apartat'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'slug'          => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_content' => new sfValidatorString(array('required' => false)),
      'web_content'   => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_content[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'iogNewsletterContent';
  }


}
