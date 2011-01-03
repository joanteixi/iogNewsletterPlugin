<?php

/**
 * iogNewsletterContent form.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage form
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class iogNewsletterContentForm extends BaseiogNewsletterContentForm
{
    public function configure()
    {
        unset($this['slug']);
        $this->widgetSchema->setLabels(array(
                'iog_newsletter_content_type_id' => 'Tipus de contingut',
                'title' => 'Títol',
                'description' => 'Descripció'));

        $this->widgetSchema['extract'] = new sfWidgetFormCKEditor();
        $this->widgetSchema['description'] = new sfWidgetFormCKEditor(ckeditorConfig::getBasic());
    }
}
