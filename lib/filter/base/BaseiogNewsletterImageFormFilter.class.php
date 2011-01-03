<?php

/**
 * iogNewsletterImage filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseiogNewsletterImageFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'tag'               => new sfWidgetFormFilterInput(),
      'iog_newsletter_id' => new sfWidgetFormPropelChoice(array('model' => 'iogNewsletter', 'add_empty' => true)),
      'sf_asset_id'       => new sfWidgetFormPropelChoice(array('model' => 'sfAsset', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'tag'               => new sfValidatorPass(array('required' => false)),
      'iog_newsletter_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'iogNewsletter', 'column' => 'id')),
      'sf_asset_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfAsset', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_image_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'iogNewsletterImage';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'tag'               => 'Text',
      'iog_newsletter_id' => 'ForeignKey',
      'sf_asset_id'       => 'ForeignKey',
    );
  }
}
