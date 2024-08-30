<?php

function MonAutoload($class) {
    include  $class . '.php';
}

spl_autoload_register('MonAutoload');

use MesProduits\ProduitParLots;
use MesProduits\Produit;

$cartouchesEncre=new ProduitParLots("Cartouches d'encre",10,10,50.2);

$imprimante=new Produit("imprimante",1,800);
$ordinateur=new Produit("ordinateur",1,1200);

echo "nombre de produits différents créés:".Produit::$nbProduits."<br>";

$cartouchesEncre->ajouterProduit();
echo $cartouchesEncre;

$imprimante->ajouterProduit();
$imprimante->supprimerProduit();
echo $imprimante;