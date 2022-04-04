<?php

namespace App\Repository;

use App\Entity\Equipes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Equipes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Equipes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Equipes[]    findAll()
 * @method Equipes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Equipes::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Equipes $entity, bool $flush = true): void
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
    public function remove(Equipes $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

     /**
      * @return Equipes[] Returns an array of Equipes objects
      */
    public function findBySearch($text)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.nom LIKE :val')
            ->setParameter('val', '%'.$text."%")
            ->getQuery()
            ->getResult()
        ;
    }


    /**
     * @return Equipes[] Returns an array of Equipes objects
     */
    public function findByCategory($category)
    {
        return $this->createQueryBuilder('e')
//            ->select('e','j','ec')
//            ->join('e.categorie','ec')
//            ->join('e.joueurs','j')
            ->Where('e.categorie = :val')
            ->setParameter('val', $category)
            ->getQuery()
            ->getResult()
            ;
    }


    /*
    public function findOneBySomeField($value): ?Equipes
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
