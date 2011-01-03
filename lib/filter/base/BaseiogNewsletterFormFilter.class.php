<?php

/**
 * iogNewsletter filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseiogNewsletterFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'numero'                   => new sfWidgetFormFilterInput(),
      'data_publicacio'          => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'titular'                  => new sfWidgetFormFilterInput(),
      'template_id'              => new sfWidgetFormPropelChoice(array('model' => 'IogNewsletterTemplate', 'add_empty' => true)),
      'send_date'                => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'iog_newsletter_llista_id' => new sfWidgetFormPropelChoice(array('model' => 'IogNewsletterLlista', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'numero'                   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'data_publicacio'          => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'titular'                  => new sfValidatorPass(array('required' => false)),
      'template_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'IogNewsletterTemplate', 'column' => 'id')),
      'send_date'                => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'iog_newsletter_llista_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'IogNewsletterLlista', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'iogNewsletter';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'numero'                   => 'Number',
      'data_publicacio'          => 'Date',
      'titular'                  => 'Text',
      'template_id'              => 'ForeignKey',
      'send_date'                => 'Date',
      'iog_newsletter_llista_id' => 'ForeignKey',
    );
  }
}
