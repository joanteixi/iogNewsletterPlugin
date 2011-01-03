<?php

class iogNewsletterPeer extends BaseiogNewsletterPeer
{
    /**
     * Retorna el id, número i any dels newsletters endreçats per la data de publicació
     */
    static public function doSelectHistoric()
    {
        $c = new Criteria();
        $c->addDescendingOrderByColumn(self::DATA_PUBLICACIO);
        return self::doSelect($c);
    }

    static public function retrieveByNumero($n)
    {
        $c = new Criteria();
        $c->add(self::NUMERO, $n);
        return self::doSelectOne($c);
    }

    static public function getIdByNumero($n)
    {
        $obj = self::retrieveByNumero($n);
        return $obj->getNumero();
    }

    /**
     * Return the max númber of all newsletter.
     * @return integer
     */
    static public function getMaxNumero()
    {
        $c = new Criteria();
        $c->clearSelectColumns();
        $c->addSelectColumn(self::NUMERO);
        $c->addDescendingOrderByColumn(self::NUMERO);
        $c->setLimit(1);
        $stmt = self::doSelectStmt($c);
        while($row = $stmt->fetch(PDO::FETCH_NUM))
        {
          $num = $row[0];
          return $num ? $num : 0;
        }

    }





}
