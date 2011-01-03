<?php

/**
 * iogNewsletterImages form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseiogNewsletterImagesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                => new sfWidgetFormInputHidden(),
      'iog_newsletter_id' => new sfWidgetFormPropelChoice(array('model' => 'iogNewsletter', 'add_empty' => true)),
      'sf_asset_id'       => new sfWidgetFormPropelChoice(array('model' => 'sfAsset', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'                => new sfValidatorPropelChoice(array('model' => 'iogNewsletterImages', 'column' => 'id', 'required' => false)),
      'iog_newsletter_id' => new sfValidatorPropelChoice(array('model' => 'iogNewsletter', 'column' => 'id', 'required' => false)),
      'sf_asset_id'       => new sfValidatorPropelChoice(array('model' => 'sfAsset', 'column' => 'id', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_images[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'iogNewsletterImages';
  }


}
