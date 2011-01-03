<?php

class iogNewsletterContentPeer extends BaseiogNewsletterContentPeer
{
    /**
     * Retorna el contingut corresponent a l'apartat demanat i al número del newsletter
     * @param String $apartat  iogNewsletterContentType->getType()
     * @param integer $num, string $apartat
     * @return object iogNewsletterContent
     */
    static public function getApartat($id,$apartat)
    {
        $c = new Criteria();
            //ara cerquem l'article destacat
            $c = new Criteria();
            $c->add(self::APARTAT, $apartat);
            $c->add(self::NEWSLETTER_ID, $id);

            return self::doSelectOne($c);

    }
    /**
     * retorna el conjunt d'articles amb un mateix apartat corresponent a newsletter NUM
     * @param integer $num Número del newsletter
     * @return iogNewsletterContent collection object
     */
    static public function getApartats($apartats, $num)
    {
        $c = new Criteria();
        if ($id_tipus_destacat = iogNewsletterContentTypePeer::retrieveIdByType($apartats))
        {
            //cerquem notícies
            $c = new Criteria();
            $c->add(self::IOG_NEWSLETTER_ID, $num);
            $c->add(self::IOG_NEWSLETTER_CONTENT_TYPE_ID, $id_tipus_destacat);

            return self::doSelect($c);


        }
    }

    static public function retrieveByApartat($numero, $apartat)
            {
        $id_tipus_apartat = iogNewsletterContentTypePeer::retrieveIdByType($apartat);
        $c = new Criteria();
        $c->add(self::IOG_NEWSLETTER_ID,  iogNewsletterPeer::getIdByNumero($numero));
        $c->add(self::IOG_NEWSLETTER_CONTENT_TYPE_ID, $id_tipus_apartat);
        return self::doSelectOne($c);
    }

}
