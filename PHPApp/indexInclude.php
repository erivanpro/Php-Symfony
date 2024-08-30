<?php
include "Produit.php";


$imprimante=new Produit;
$imprimante->setNom("imprimante");
$imprimante->setQuantite(12);
$imprimante->setPrix(120.5);
echo $imprimante;

