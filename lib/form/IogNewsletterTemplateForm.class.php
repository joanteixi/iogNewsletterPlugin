<?php

/**
 * IogNewsletterTemplate form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 */
class IogNewsletterTemplateForm extends BaseIogNewsletterTemplateForm {

  public function configure() {
    foreach ($this->getObject()->getIogNewsletterTemplateApartats() as $index => $apartat) {
      $f = new iogNewsletterTemplateApartatForm($apartat);
      $fieldname = 'Apartat_' . $apartat->getId();
      $this->embedForm($fieldname, $f);
    }
  }

}
