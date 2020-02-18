<?php

namespace App\Repository;

use App\Entity\PostReportView;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;

class PostReportViewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PostReportView::class);
    }

    public function getReport(): Query
    {
        return $this->createQueryBuilder('p')->getQuery();
    }
}