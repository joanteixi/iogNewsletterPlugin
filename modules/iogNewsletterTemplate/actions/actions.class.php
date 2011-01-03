<?php

require_once dirname(__FILE__).'/../lib/iogNewsletterTemplateGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/iogNewsletterTemplateGeneratorHelper.class.php';

/**
 * iogNewsletterTemplate actions.
 *
 * @package    laiogurtera
 * @subpackage iogNewsletterTemplate
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class iogNewsletterTemplateActions extends autoIogNewsletterTemplateActions
{
   public function preExecute() {

    $this->setLayout(ProjectConfiguration::getActive()->getTemplateDir('iogNewsletter', 'layout.php') . '/layout');
    parent::preExecute();
  }
}
