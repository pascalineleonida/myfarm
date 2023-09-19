<?php

namespace App\Repository;

use App\Entity\PharmaciedbPatients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PharmaciedbPatients>
 *
 * @method PharmaciedbPatients|null find($id, $lockMode = null, $lockVersion = null)
 * @method PharmaciedbPatients|null findOneBy(array $criteria, array $orderBy = null)
 * @method PharmaciedbPatients[]    findAll()
 * @method PharmaciedbPatients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PharmaciedbPatientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PharmaciedbPatients::class);
    }

//    /**
//     * @return PharmaciedbPatients[] Returns an array of PharmaciedbPatients objects
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

//    public function findOneBySomeField($value): ?PharmaciedbPatients
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
