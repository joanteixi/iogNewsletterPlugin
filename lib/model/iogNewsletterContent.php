<?php

class iogNewsletterContent extends BaseiogNewsletterContent
{

    public function __toString()
    {
        return $this->getEmailContent();
    }

    
    public function setTitle($v)
    {
        parent::setTitle($v);
        parent::setSlug(iogTools::slugify($v));
    }



}