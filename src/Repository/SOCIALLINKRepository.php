<?php

namespace App\Repository;

use App\Entity\SOCIALLINK;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SOCIALLINK>
 *
 * @method SOCIALLINK|null find($id, $lockMode = null, $lockVersion = null)
 * @method SOCIALLINK|null findOneBy(array $criteria, array $orderBy = null)
 * @method SOCIALLINK[]    findAll()
 * @method SOCIALLINK[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SOCIALLINKRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SOCIALLINK::class);
    }

    //    /**
    //     * @return SOCIALLINK[] Returns an array of SOCIALLINK objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?SOCIALLINK
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
