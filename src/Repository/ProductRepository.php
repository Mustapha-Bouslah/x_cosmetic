<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Product::class);
    }

    // /**
    //  * @return Product[] Returns an array of Product objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
    public function findThree() /* pour ne sélectionner que 3 produits */
    {
        return $this->createQueryBuilder('s') /* 's' est un alias */
        ->andWhere('s.id > :val') /* on cherhce un id supérieur à une valeur */
        ->setParameter('val', '0') /* on donne la valeur */
        ->orderBy('s.id', 'DESC') /* tri en ordre décroissant */
        ->setMaxResults(3) /* on sélectionne 6 résultats maximum */
        ->getQuery() /* requête */
        ->getResult() /* résultats */
            ;
    }

    public function findByMinPrice($priceMini) /* pour sélectionner par prix */
    {
        return $this->createQueryBuilder('m')
            ->andWhere('ms.superficie < :val') /* on cherche un prix < une valeur */
            ->setParameter('val', $priceMini) /* on définit cette valeur*/
            ->orderBy('m.price', 'DESC') /* tri en ordre décroissant */
            ->getQuery() /* requête */
            ->getResult() /* résultats */
            ;
    }
}
