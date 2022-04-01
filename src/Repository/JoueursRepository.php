<?php

namespace App\Repository;

use App\Entity\Joueurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Joueurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Joueurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Joueurs[]    findAll()
 * @method Joueurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class JoueursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Joueurs::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Joueurs $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Joueurs $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

     /**
      * @return Joueurs[] Returns an array of Joueurs objects
      */

    public function findBySearch($value)
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.nom LIKE :val OR j.prenom LIKE :val1')
            ->setParameter('val', '%'.$value.'%')
            ->setParameter('val1', '%'.$value.'%')
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Joueurs
    {
        return $this->createQueryBuilder('j')
            ->andWhere('j.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
