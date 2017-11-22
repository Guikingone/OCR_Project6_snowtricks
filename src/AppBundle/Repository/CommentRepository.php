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
    public function findAllForTrickOrderedByCreatedAt($trickName)
    {
        return $this->createQueryBuilder('comment')
            ->orderBy('comment.created_at', 'DESC')
            ->getQuery()
            ->execute();
    }
}