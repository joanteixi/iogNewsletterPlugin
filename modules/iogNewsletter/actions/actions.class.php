<?php


require_once dirname(__FILE__) . '/../lib/iogNewsletterGeneratorConfiguration.class.php';
require_once dirname(__FILE__) . '/../lib/iogNewsletterGeneratorHelper.class.php';

/**
 * iogNewsletterAdmin actions.
 *
 * @package    serveisolidari
 * @subpackage iogNewsletterAdmin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class iogNewsletterActions extends autoIogNewsletterActions {

  public function preExecute() {

    $this->setLayout(ProjectConfiguration::getActive()->getTemplateDir('iogNewsletter', 'layout.php') . '/layout');
    parent::preExecute();
  }

  /**
   * Grabar el contingut
   */
  public function executeAjaxSave(sfWebRequest $request) {
    $id = substr(strstr($request->getParameter('id'), '_'), 1);
    $ap = iogNewsletterContentPeer::retrieveByPK($id);
    $ap->setEmailContent($request->getParameter('html'));
    $ap->save();
    return $this->renderText($request->getParameter('html'));
  }

  /**
   * Mostra el newsletter NUMERO
   * @param numero int Número corresponent al newsletter
   */
  public function executeShow(sfWebRequest $request) {
    if (method_exists($this->getRoute(), 'getObject')) {
      $this->newsletter = $this->getRoute()->getObject();
    } else {
      $this->newsletter = iogNewsletterPeer::retrieveByPk($request->getParameter('newsletter_id'));
    }
    $this->templates = IogNewsletterTemplatePeer::doSelect(new Criteria());
  }

  /**
   * Mostra el newsletter NUMERO que s'enviarà per MAIL.
   * @param numero int Número corresponent al newsletter
   */
  public function executeShowForMail(sfWebRequest $request) {
    $this->newsletter = iogNewsletterPeer::retrieveByNumero($request->getParameter('numero'));
    $this->setLayout($this->getContext()->getConfiguration()->getTemplateDir('iogNewsletter', 'sendEmailLayout.php') . DIRECTORY_SEPARATOR . 'newsLayout');
  }

  public function executeShowApartat(sfWebRequest $request) {
    $this->content = $this->getRoute()->getObject();
    $this->newsletter = $this->content->getIogNewsletter();
  }

  /**
   * Actualitza el contingut d'un apartat del newsletter. En el cas que s'envïi el camp "field"
   * es farà servir el mètode setDescription. Sinó s'actualitza només el resum.
   *
   * @param integer $numero
   * @param string  $apartat
   * @param string  $html
   */
  public function executeActualitzarApartat(sfWebRequest $request) {
    //cercar el número i l'apartat
    $p = iogNewsletterContentPeer::retrieveByApartat($request->getParameter('numero'), $request->getParameter('apartat'));
    if ($request->getParameter('field') != Null) {
      $p->setDescription($request->getParameter('html'));
    } else {
      $p->setExtract($request->getParameter('html'));
    }
    $p->save();

    return $this->renderText('ok');
  }

  /**
   * Actualitza el camp foto del newsletter. S'envia el 'tag' del camp a actualitzar i el núm de newsletter
   *
   * @param sfWebRequest $request
   *          String tag identificador del camp
   *          Integer id_newsletter id del newsletter
   *          String url_image url relatiu del asset
   *
   */
  public function executeActualitzarFotos(sfWebRequest $request) {
    //el tag que s'envia es "foto_IDDELCAMP". O sigui que el tag es IDDELCAMP
    $tag = $request->getParameter('tag');
    $tag = substr(strrchr($tag, '_'), 1);
    $p = iogNewsletterImagePeer::retrieveByTag($tag, $request->getParameter('id_newsletter'));
    $asset = sfAssetPeer::retrieveFromUrl($request->getParameter('url_image'));
    $p->setSfAssetId($asset->getId());
    $p->save();
    return $this->renderText('1');
  }

  /**
   * Envia per mail el newsletter.
   * $request params: $newsletter object
   *
   * @param sfWebRequest $request
   */
  public function executeSend(sfWebRequest $request) {


    if (!$this->getUser()->isAuthenticated()) {
      return $this->redirect404();
    }

    if (method_exists($this->getRoute(), 'getObject')) {
      $newsletter = $this->getRoute()->getObject();
    } else {
      $newsletter = iogNewsletterPeer::retrieveByPk($request->getParameter('newsletter_id'));
    }
    if (!$newsletter) {
      return $this->redirect404();
    }

//configurar el swift mailer
    $message = Swift_Message::newInstance()
                    ->setFrom(sfConfig::get('app_mailer_from', 'eliogurt@gmail.com'));
    if ($request->hasParameter('prova')) {
      //comprova si email de prova és correcte:
      if (newsletterTools::validarEmail($request->getParameter('email_prova'))) {

        $message->setTo($request->getParameter('email_prova'));
      } else {
        $this->getUser()->setFlash('mail_error', 'Error en el mail');
        $this->getUser()->setFlash('email_prova', $request->getParameter('email_prova'));
        $this->getUser()->setFlash('notice-error',"L'adreça de correu de prova és incorrecta");

        $this->forward('iogNewsletter', 'show');
      }
    } else {
      $message->setTo(IogNewsletterEmailsPeer::doSelectByLlista($newsletter->getIogNewsletterLlistaId()));
    }
    $message->setSubject($newsletter->getTitular())
            ->setBody($this->getPartial('iogNewsletter/container_newsletter_html', array('newsletter' => $newsletter)), 'text/html');


    if ($request->hasParameter('prova')) {
      $this->getMailer()->sendNextImmediately()->send($message);
      $this->getUser()->setFlash('notice',"El newsletter de prova ja s'ha enviat");
      return $this->redirect('iog_newsletter_show', $newsletter);
      } else {
      $this->getMailer()->batchSend($message);
       $newsletter->setSendDate(time());
    $newsletter->save();
    $this->getUser()->setFlash('notice', 'El newsletter ja està preparat per ser enviat durant aquesta nit.');
    return $this->redirect('@newsletter');
    }
//marca el missatge com enviat
   
  }

  public function executeChangeLlista(sfWebRequest $request) {
    $newsletter = iogNewsletterPeer::retrieveByPK($request->getParameter('id'));
    $newsletter->setIogNewsletterLlistaId($request->getParameter('llista_id'));
    $newsletter->save();
    return $this->renderText('ok');
  }

  public function executeSendPreparedEmails(sfWebRequest $request) {
    $spool = $this->getMailer()->getSpool();
    $spool->setMessageLimit(100);
//    $spool->setTimeLimit($options['time-limit']);

    $this->sent = $this->getMailer()->flushQueue();
  }

}
