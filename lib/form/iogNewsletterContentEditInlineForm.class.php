<?php

class iogNewsletterContentEditInlineForm extends BaseiogNewsletterContentForm
{
    public function configure()
    {
        unset($this['slug']);
        $this->widgetSchema->setLabels(array(
                'iog_newsletter_content_type_id' => 'Tipus de contingut',
                'title' => 'Títol',
        ));
        $this->widgetSchema['extract'] = new sfWidgetFormTextareaTinyMCE(iogTinymceDefault::getDefaults(array(
                'width' => '400',
                'height' => '300',
                'config' => 'content_css : "/css/estils_edicio_newsletter.css?'.rand(1,100).'"'
        )));

    }
}
?>
