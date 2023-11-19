<?php

namespace App\Repository;

use App\Entity\ActiviteDomaine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ActiviteDomaine>
 *
 * @method ActiviteDomaine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ActiviteDomaine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ActiviteDomaine[]    findAll()
 * @method ActiviteDomaine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActiviteDomaineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ActiviteDomaine::class);
    }

//    /**
//     * @return ActiviteDomaine[] Returns an array of ActiviteDomaine objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ActiviteDomaine
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
