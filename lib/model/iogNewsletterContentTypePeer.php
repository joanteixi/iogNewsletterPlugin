<?php

class iogNewsletterContentTypePeer extends BaseiogNewsletterContentTypePeer
{

    static public function retrieveIdByType($type)
    {

        $c  = new Criteria();
        $c->add(self::TYPE, $type);
        $obj = self::doSelectOne($c);
        if (!is_object($obj))
        {
            throw new sfException(sprintf('No existeix "%s" com a tipus de contingut', $type));

        }
        return $obj->getId();
    }
}
