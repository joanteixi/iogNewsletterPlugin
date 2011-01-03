<?php

class iogNewsletterContentType extends BaseiogNewsletterContentType
{
    public function __toString()
    {
        return $this->getType();
    }
}
