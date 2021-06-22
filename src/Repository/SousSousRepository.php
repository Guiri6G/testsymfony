<?php

namespace App\Repository;

use App\Entity\SousSous;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SousSous|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousSous|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousSous[]    findAll()
 * @method SousSous[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousSousRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SousSous::class);
    }

    public function findSousSous($search)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            "SELECT s.id as idS, s.libelle as libelleS, sf.libelle as libelleSF, f.libelle as libelleF
            FROM App\Entity\SousSous s , App\Entity\SousFamille sf, App\Entity\Famille f
            WHERE s.idSousFamille = sf.id 
            AND sf.idFamille = f.id
            AND s.libelle LIKE '%" . $search . "%'"
        );
        return $query->getResult();
    }

    // /**
    //  * @return SousSous[] Returns an array of SousSous objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SousSous
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
