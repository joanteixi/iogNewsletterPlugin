<?php

/**
 * iogNewsletterContent filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseiogNewsletterContentFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'newsletter_id' => new sfWidgetFormPropelChoice(array('model' => 'iogNewsletter', 'add_empty' => true)),
      'apartat'       => new sfWidgetFormFilterInput(),
      'title'         => new sfWidgetFormFilterInput(),
      'slug'          => new sfWidgetFormFilterInput(),
      'email_content' => new sfWidgetFormFilterInput(),
      'web_content'   => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'newsletter_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'iogNewsletter', 'column' => 'id')),
      'apartat'       => new sfValidatorPass(array('required' => false)),
      'title'         => new sfValidatorPass(array('required' => false)),
      'slug'          => new sfValidatorPass(array('required' => false)),
      'email_content' => new sfValidatorPass(array('required' => false)),
      'web_content'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_content_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'iogNewsletterContent';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'newsletter_id' => 'ForeignKey',
      'apartat'       => 'Text',
      'title'         => 'Text',
      'slug'          => 'Text',
      'email_content' => 'Text',
      'web_content'   => 'Text',
    );
  }
}
