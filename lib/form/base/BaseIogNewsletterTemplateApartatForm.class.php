<?php

/**
 * IogNewsletterTemplateApartat form base class.
 *
 * @method IogNewsletterTemplateApartat getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIogNewsletterTemplateApartatForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                         => new sfWidgetFormInputHidden(),
      'iog_newsletter_template_id' => new sfWidgetFormPropelChoice(array('model' => 'IogNewsletterTemplate', 'add_empty' => true)),
      'name'                       => new sfWidgetFormInputText(),
      'email_content'              => new sfWidgetFormTextarea(),
      'web_content'                => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'iog_newsletter_template_id' => new sfValidatorPropelChoice(array('model' => 'IogNewsletterTemplate', 'column' => 'id', 'required' => false)),
      'name'                       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'email_content'              => new sfValidatorString(array('required' => false)),
      'web_content'                => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_template_apartat[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IogNewsletterTemplateApartat';
  }


}
