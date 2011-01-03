<?php

class iogNewsletter extends BaseiogNewsletter {

  public function __toString() {
    return $this->getNumero() . '[' . $this->getDataPublicacio('m/Y') . ']';
  }

  /**
   * shortcut to return the article with apartat_type = $apartat.
   * It just call getAApartat from content peer
   *
   * @param String $apartat
   * @return Peer method
   * @see iogNewsletterContentPeer:getApartats

   */
  public function getApartat($apartat) {
    return iogNewsletterContentPeer::getApartat($this->getId(), $apartat);
  }

  /**
   * Get all the articles with apartat_type = $apartats.
   * @return Peer method
   * @see iogNewsletterContentPeer:getApartats
   */
  public function getApartats($apartats) {
    return iogNewsletterContentPeer::getApartats($apartats, $this->getId());
  }

  protected function doSave(PropelPDO $con) {
    if ($this->isNew()) {
      $this->setNumero(iogNewsletterPeer::getMaxNumero() + 1);
    }
    return parent::doSave($con);
  }

  /**
   * Retorna el objecte ASSET corresponent a aquest newsletter amb determinat TAG.
   * @param String $tag
   * @return sfAsset or false
   */
  public function getAsset($tag) {
    $c = new Criteria();
    try {
      $asset_id = iogNewsletterImagePeer::retrieveAssetByTag($tag, $this->getId());
    } catch (sfException $e) {
      //si no hi ha el tag, return false.
      return false;
    }

    if ($asset_id) {
      return sfAssetPeer::retrieveByPK($asset_id);
    } else {
      return false;
    }
  }

  public function getTemplateName() {
    $t = $this->getIogNewsletterTemplate();
    return $t->getName();
  }

  public function getLlistaName() {
    $t = $this->getIogNewsletterLlista();
    return $t->getNom();
  }

  /**
   * Return true if newsletter has been sended before
   */
  public function isSended() {
    if ($this->getSendDate() > 0) {
      return true;
    }
    return false;
  }

}

class NewsletterMixin {
  /**
   * Crea els continguts dintre de cada nou newletter. Apartats que es creen
   *  inedit
   *  informacio
   *  interview
   *  org
   *  ingredients
   *
   */

  /**
   * Crea els continguts "patrons" del newsletter.
   *
   * @param Object $obj iogNewsletter object
   */
  public function crearPatro($obj) {
    if (count($obj->getIogNewsletterTemplate()) > 0) {

        $template = $obj->getIogNewsletterTemplate();
        /**
         * Cada patró té uns camps definits: centre, left, rigth, bottom, column1, column2, etc, etc
         */
        foreach ($template->getIogNewsletterTemplateApartats() as $apartat)
        {
          $p = new iogNewsletterContent();
          $p->setNewsletterId($obj->getId());
          $p->setApartat($apartat->getName());
          $p->setEmailContent($apartat->getEmailContent());
          $p->setWebContent($apartat->getWebContent());
          $p->save();
        }
      }
    }

}

sfMixer::register('BaseiogNewsletter:save:post', array('NewsletterMixin', 'crearPatro'));