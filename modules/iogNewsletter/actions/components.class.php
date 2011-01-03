<?php

class iogNewsletterComponents extends sfComponents {

  /**
   * Mostra el nombre d'emails pendents de ser enviats
   */
  public function executeState() {

    $this->nb_emails = MailMessagePeer::doCount(new Criteria());
    
  }

}
