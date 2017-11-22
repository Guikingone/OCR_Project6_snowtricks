<?php
/**
 * Created by PhpStorm.
 * User: ugo-fixe
 * Date: 22/11/2017
 * Time: 12:27
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Trick;
use Doctrine\ORM\EntityRepository;

class TrickRepository extends EntityRepository
{
    /**
     * @return Trick[]
     */
    public function findAllOrderedByCreatedAt()
    {
        return $this->createQueryBuilder('trick')
            ->orderBy('trick.createdAt', 'DESC')
            ->getQuery()
            ->execute();
    }
}