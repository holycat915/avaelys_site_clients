<?php

namespace App\Repository;

use App\Entity\DomainName;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DomainName>
 *
 * @method DomainName|null find($id, $lockMode = null, $lockVersion = null)
 * @method DomainName|null findOneBy(array $criteria, array $orderBy = null)
 * @method DomainName[]    findAll()
 * @method DomainName[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DomainNameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DomainName::class);
    }

    public function save(DomainName $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(DomainName $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return DomainName[] Returns an array of DomainName objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('d.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

    /**
    //     * @return DomainName[] Returns an array of DomainName objects
    //     */
    public function findByUser(int $id): array
    {


        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
            ->innerJoin('d.users', 'user')
            ->andWhere('user.id = :val')
            ->setParameter('val', $id)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
    //     * @return UsersByDomainName[] Returns an array of DomainName objects
    //     */
    public function findUsersByDomainName(int $id): array
    {


        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
            ->innerJoin('d.users', 'user')
            ->andWhere('d.id = :val')
            ->setParameter('val', $id)
            ->orderBy('d.id', 'ASC')
            ->getQuery()
            ->getResult()
        ;
    }

//    public function findOneBySomeField($value): ?DomainName
//    {
//        return $this->createQueryBuilder('d')
//            ->andWhere('d.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
