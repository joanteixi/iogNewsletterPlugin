<?php

/**
 * IogNewsletterEmails form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class IogNewsletterEmailsForm extends BaseIogNewsletterEmailsForm {

  public function configure() {
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => true), array('required' => 'Cal posar un email', 'invalid' => 'Aquest email ja existeix'));
    $this->validatorSchema->setPostValidator(new sfValidatorPropelUnique(array('model' => 'IogNewsletterEmails', 'column' => array('email')), array('invalid' => 'Aquest email ja existeix.')));
    $this->widgetSchema['iog_newsletter_llista_id']->setLabel('Llista');
    $this->widgetSchema['iog_newsletter_llista_id']->setOption('add_empty', false);
  }

}
