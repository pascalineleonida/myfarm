<?php

namespace App\Repository;

use App\Entity\EntrypointsJson;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EntrypointsJson>
 *
 * @method EntrypointsJson|null find($id, $lockMode = null, $lockVersion = null)
 * @method EntrypointsJson|null findOneBy(array $criteria, array $orderBy = null)
 * @method EntrypointsJson[]    findAll()
 * @method EntrypointsJson[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EntrypointsJsonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EntrypointsJson::class);
    }

//    /**
//     * @return EntrypointsJson[] Returns an array of EntrypointsJson objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EntrypointsJson
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
