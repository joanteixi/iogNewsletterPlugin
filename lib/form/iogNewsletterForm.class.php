<?php

/**
 * iogNewsletter form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class iogNewsletterForm extends BaseiogNewsletterForm {

  public function configure() {
    unset($this['numero'], $this['send_date']);
    $this->widgetSchema['data_publicacio'] = new sfWidgetFormJQueryDate(array('default' => time()));

    $this->widgetSchema['iog_newsletter_llista_id']->setOption('add_empty',false);
    $this->widgetSchema['template_id']->setOption('add_empty',false);
    //validators
    $this->validatorSchema['titular'] = new sfValidatorString(array('required' => true), array('required' => 'Cal posar un titular al newsletter'));
    $this->validatorSchema['iog_newsletter_llista_id']->setOption('required',true);
  }

}
