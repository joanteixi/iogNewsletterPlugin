<?php

/**
 * IogNewsletterTemplateApartat filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIogNewsletterTemplateApartatFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'iog_newsletter_template_id' => new sfWidgetFormPropelChoice(array('model' => 'IogNewsletterTemplate', 'add_empty' => true)),
      'name'                       => new sfWidgetFormFilterInput(),
      'email_content'              => new sfWidgetFormFilterInput(),
      'web_content'                => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'iog_newsletter_template_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'IogNewsletterTemplate', 'column' => 'id')),
      'name'                       => new sfValidatorPass(array('required' => false)),
      'email_content'              => new sfValidatorPass(array('required' => false)),
      'web_content'                => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_template_apartat_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IogNewsletterTemplateApartat';
  }

  public function getFields()
  {
    return array(
      'id'                         => 'Number',
      'iog_newsletter_template_id' => 'ForeignKey',
      'name'                       => 'Text',
      'email_content'              => 'Text',
      'web_content'                => 'Text',
    );
  }
}
