<?php

/**
 * MailMessage form base class.
 *
 * @method MailMessage getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseMailMessageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'message'    => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'id'         => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'message'    => new sfValidatorPass(),
      'created_at' => new sfValidatorDateTime(array('required' => false)),
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('mail_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'MailMessage';
  }


}
