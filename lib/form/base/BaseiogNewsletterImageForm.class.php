<?php

/**
 * iogNewsletterImage form base class.
 *
 * @method iogNewsletterImage getObject() Returns the current form's model object
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseiogNewsletterImageForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'tag'               => new sfWidgetFormInputText(),
      'iog_newsletter_id' => new sfWidgetFormPropelChoice(array('model' => 'iogNewsletter', 'add_empty' => true)),
      'sf_asset_id'       => new sfWidgetFormPropelChoice(array('model' => 'sfAsset', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'tag'               => new sfValidatorString(array('max_length' => 50, 'required' => false)),
      'iog_newsletter_id' => new sfValidatorPropelChoice(array('model' => 'iogNewsletter', 'column' => 'id', 'required' => false)),
      'sf_asset_id'       => new sfValidatorPropelChoice(array('model' => 'sfAsset', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_image[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'iogNewsletterImage';
  }


}
