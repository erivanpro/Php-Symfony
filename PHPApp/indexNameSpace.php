<?php

function MonAutoload($class) {
    include  $class . '.php';
}

spl_autoload_register('MonAutoload');
use MesProduits\Produit;
$imprimante=new Produit;
$imprimante->setNom("imprimante");
$imprimante->setQuantite(12);
$imprimante->setPrix(120.5);
echo $imprimante;

