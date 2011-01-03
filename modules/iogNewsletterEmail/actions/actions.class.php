<?php

require_once dirname(__FILE__) . '/../lib/iogNewsletterEmailGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/iogNewsletterEmailGeneratorHelper.class.php';

/**
 * emails actions.
 *
 * @package    laiogurtera
 * @subpackage emails
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class iogNewsletterEmailActions extends autoIogNewsletterEmailActions {

  public function preExecute() {

    $this->setLayout(ProjectConfiguration::getActive()->getTemplateDir('iogNewsletter', 'layout.php') . '/layout');
    parent::preExecute();
  }

  public function executeIndex(sfWebRequest $request) {

    if ($request->hasParameter('llista_id'))
    {
      $this->setFilters(array('iog_newsletter_llista_id' => $request->getParameter('llista_id')));
    }
    parent::executeIndex($request);
  }


}
