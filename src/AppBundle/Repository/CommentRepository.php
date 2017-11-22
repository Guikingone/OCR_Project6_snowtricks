<?php
/**
 * Created by PhpStorm.
 * User: ugo-fixe
 * Date: 22/11/2017
 * Time: 12:27
 */

namespace AppBundle\Repository;


use AppBundle\Entity\Comment;
use Doctrine\ORM\EntityRepository;

class CommentRepository extends EntityRepository
{
    /**
     * @return Comment[]
     */
    public function findAllForTrickOrderedByCreatedAt($trickId)
    {
        return $this->createQueryBuilder('comment')
            ->where('comment.trick = :trick')
            ->setParameter('trick', $trickId)
            ->orderBy('comment.createdAt', 'DESC')
            ->getQuery()
            ->execute();
    }
}