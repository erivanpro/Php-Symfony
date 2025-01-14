<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Data\ListeProduits;
use App\Entity\Produit;

class ProduitFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);
        foreach( ListeProduits::$mesProduits as $monProduit ) {

            $produit=new Produit; 

            $produit->setNom($monProduit['nom']); 
            $produit->setPrix($monProduit['prix']); 
            $produit->setQuantite($monProduit['quantite']); 
            $produit->setRupture($monProduit['rupture']); 
            $manager->persist($produit);

        }
        $manager->flush();
    }
}
