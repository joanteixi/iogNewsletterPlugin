<?php

/**
 * IogNewsletterEmails form base class.
 *
 * @method IogNewsletterEmails getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIogNewsletterEmailsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                       => new sfWidgetFormInputHidden(),
      'email'                    => new sfWidgetFormInputText(),
      'nom'                      => new sfWidgetFormInputText(),
      'cognoms'                  => new sfWidgetFormInputText(),
      'iog_newsletter_llista_id' => new sfWidgetFormPropelChoice(array('model' => 'IogNewsletterLlista', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                       => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'email'                    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'nom'                      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'cognoms'                  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'iog_newsletter_llista_id' => new sfValidatorPropelChoice(array('model' => 'IogNewsletterLlista', 'column' => 'id', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'IogNewsletterEmails', 'column' => array('email')))
    );

    $this->widgetSchema->setNameFormat('iog_newsletter_emails[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IogNewsletterEmails';
  }


}
