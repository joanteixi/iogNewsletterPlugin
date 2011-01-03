<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
*/
class iogNewsletterContentNewForm extends sfForm
{
    public function configure()
    {

        if (!$newsletter = $this->getOption('newsletter'))
        {
            throw new InvalidArgumentException('You must provide a newsletter object.');
        }

        for ($i = 0; $i < $this->getOption('size', 1); $i++)
        {
            $content = new iogNewsletterContent();
            // aquesta és la linia més important. Graba setiogNewsletter el valor actual del form. Encara no tinc clar
            // pq això funciona.. :-(
            $content->setiogNewsletter($newsletter);
            $subform = new iogNewsletterContentForm($content);
            // amaga el iog_newsletter_id en el cas de subformulari pq no cal. Ja estem dintre el newsletter.
            $subform->setWidget('iog_newsletter_id', new sfWidgetFormInputHidden());

            $this->embedForm($i, $subform);
        }

         //postValidador
         $this->mergePostValidator(new ContentValidatorSchema());


    }
}
?>
