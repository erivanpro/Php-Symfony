<?php

function MonAutoload($class) {
    include  $class . '.php';
}

spl_autoload_register('MonAutoload');

use MesProduits\ProduitParLots;
 
$cartouchesEncre=new ProduitParLots("Cartouches d'encre",10,10,50.2);
$cartouchesEncre->setNbArticlesParLot(10);
$cartouchesEncre->ajouterProduit();
echo $cartouchesEncre;


