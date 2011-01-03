<?php

class iogNewsletterImagePeer extends BaseiogNewsletterImagePeer
{
    /**
     * Retorna el asset amb el "tag".
     * @param String $tag 
     */
    public static function retrieveAssetByTag($tag, $newsletter_id)
    {

        $c = new Criteria();
        $c->clearSelectColumns();
        $c->addSelectColumn(self::SF_ASSET_ID);
        $c->add(self::TAG, $tag);
        $c->add(self::IOG_NEWSLETTER_ID, $newsletter_id);
        $stmt= self::doSelectStmt($c);
        while($row = $stmt->fetch(PDO::FETCH_NUM))
        {
            return $row[0];
        }
    }

    /**
     * Retorna el objecte iogNewsletter a partir del tag i el newsletter_id
     * @param String tag
     * @param Integer newsletter_id
     */
    public static function retrieveByTag($tag, $newsletter_id)
    {
        $c = new Criteria();
        $c->add(self::IOG_NEWSLETTER_ID, $newsletter_id);
        $c->add(self::TAG,$tag);
        return self::doSelectOne($c);
    }
}
