<?php
/**
 * Created by PhpStorm.
 * User: ahmet
 * Date: 5/27/18
 * Time: 3:43 PM
 */

namespace App\Repositories;


use Doctrine\ORM\EntityRepository;

class ExchangeRepository extends EntityRepository
{
    public function getLowestRatios()
    {
        $query = 'SELECT MIN(euro) AS euro, MIN(dollar) AS dollar, MIN(gbp) AS pound
                  FROM 
                  (
                  SELECT e.euro, e.dollar, e.gbp, e.provider, e.created_at FROM exchange e
                  LEFT JOIN exchange e2 ON e2.provider = e.provider AND e2.created_at > e.created_at
                  WHERE e2.provider IS NULL
                  )
                  AS provider_ratios';

        $ratios = $this->_em->getConnection()->fetchAssoc($query);

        return $ratios;
    }
}