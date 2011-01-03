<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * iogNewsletterImages filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseiogNewsletterImagesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'iog_newsletter_id' => new sfWidgetFormPropelChoice(array('model' => 'iogNewsletter', 'add_empty' => true)),
      'sf_asset_id'       => new sfWidgetFormPropelChoice(array('model' => 'sfAsset', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'iog_newsletter_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'iogNewsletter', 'column' => 'id')),
      'sf_asset_id'       => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfAsset', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_images_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'iogNewsletterImages';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'iog_newsletter_id' => 'ForeignKey',
      'sf_asset_id'       => 'ForeignKey',
    );
  }
}
