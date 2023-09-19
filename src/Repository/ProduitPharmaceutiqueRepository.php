<?php

namespace App\Repository;

use App\Entity\ProduitPharmaceutique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProduitPharmaceutique>
 *
 * @method ProduitPharmaceutique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduitPharmaceutique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduitPharmaceutique[]    findAll()
 * @method ProduitPharmaceutique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitPharmaceutiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduitPharmaceutique::class);
    }

//    /**
//     * @return ProduitPharmaceutique[] Returns an array of ProduitPharmaceutique objects
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

//    public function findOneBySomeField($value): ?ProduitPharmaceutique
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
