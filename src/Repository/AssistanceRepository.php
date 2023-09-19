<?php

namespace App\Repository;

use App\Entity\Assistance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Assistance>
 *
 * @method Assistance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Assistance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Assistance[]    findAll()
 * @method Assistance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AssistanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Assistance::class);
    }

//    /**
//     * @return Assistance[] Returns an array of Assistance objects
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

//    public function findOneBySomeField($value): ?Assistance
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
