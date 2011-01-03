<?php

/**
 * IogNewsletterEmails filter form base class.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage filter
 * @author     ##AUTHOR_NAME##
 */
abstract class BaseIogNewsletterEmailsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'email'                    => new sfWidgetFormFilterInput(),
      'nom'                      => new sfWidgetFormFilterInput(),
      'cognoms'                  => new sfWidgetFormFilterInput(),
      'iog_newsletter_llista_id' => new sfWidgetFormPropelChoice(array('model' => 'IogNewsletterLlista', 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'email'                    => new sfValidatorPass(array('required' => false)),
      'nom'                      => new sfValidatorPass(array('required' => false)),
      'cognoms'                  => new sfValidatorPass(array('required' => false)),
      'iog_newsletter_llista_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'IogNewsletterLlista', 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('iog_newsletter_emails_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'IogNewsletterEmails';
  }

  public function getFields()
  {
    return array(
      'id'                       => 'Number',
      'email'                    => 'Text',
      'nom'                      => 'Text',
      'cognoms'                  => 'Text',
      'iog_newsletter_llista_id' => 'ForeignKey',
    );
  }
}
