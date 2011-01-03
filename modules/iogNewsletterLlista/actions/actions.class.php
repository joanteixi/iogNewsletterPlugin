<?php

require_once dirname(__FILE__).'/../lib/iogNewsletterLlistaGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/iogNewsletterLlistaGeneratorHelper.class.php';

/**
 * iogNewsletterLlista actions.
 *
 * @package    laiogurtera
 * @subpackage iogNewsletterLlista
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class iogNewsletterLlistaActions extends autoIogNewsletterLlistaActions
{
   public function preExecute() {

    $this->setLayout(ProjectConfiguration::getActive()->getTemplateDir('iogNewsletter', 'layout.php') . '/layout');
    parent::preExecute();
  }
  
  public function executeListMembers($request)
  {
    return $this->redirect('@iog_newsletter_emails?llista_id='.$request->getParameter('id'));
  }
}
