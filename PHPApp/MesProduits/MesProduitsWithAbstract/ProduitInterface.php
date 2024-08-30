<?php
namespace MesProduits\MesProduitsWithAbstract;

interface ProduitInterface
{
    const DEVISE="euros";

    public function __toString();
    
    public function ajouterProduit();
    
    public function supprimerProduit();
    
}