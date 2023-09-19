<?php

namespace App\Repository;

use App\Entity\ProduitPharm;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProduitPharm>
 *
 * @method ProduitPharm|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitPharm|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitPharm[]    findAll()
 * @method ProduitPharm[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitPharmRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitPharm::class);
    }

//    /**
//     * @return ProduitPharm[] Returns an array of ProduitPharm objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ProduitPharm
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
