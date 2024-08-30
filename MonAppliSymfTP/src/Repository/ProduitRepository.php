<?php

namespace App\Repository;

use App\Entity\Produit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

use Doctrine\ORM\Query\ResultSetMapping;
/**
 * @method Produit|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produit|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produit[]    findAll()
 * @method Produit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produit::class);
    }

    // /**
    //  * @return Produit[] Returns an array of Produit objects
    //  */
    
    public function orderingProduit()
    {
        $listeProduits=$this->getEntityManager()
            ->createQuery("SELECT p FROM App\Entity\Produit p ORDER BY p.id DESC")
            ->getResult(); 
        
            
            // avec SQL
        //     $conn = $this->getEntityManager()->getConnection();
          
        //     $sql="SELECT * FROM produit ORDER BY id DESC";
        //     $stmt = $conn->prepare($sql);
        //     $stmt->execute();
    
        // // returns an array of arrays (i.e. a raw data set)
        // $listeProduits=$stmt->fetchAll();
    
 
            
      return $listeProduits;         
    }
    
    public function getLastProduit()
    {

        $lastProduit=$this->createQueryBuilder('p')
        ->orderBy('p.id', 'DESC')
        ->setMaxResults(1)
        ->getQuery()
        ->getOneOrNullResult();

        return $lastProduit;

    }
    /*
    public function findOneBySomeField($value): ?Produit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
