<?php
namespace MesProduits\MesProduitsWithAbstract;
abstract class ProduitAbstract implements ProduitInterface
{

    static $nbProduits;
    protected $nom;
    protected $quantite;
    protected $prix;
    protected $rupture;

    abstract function __toString();
    
    abstract  function ajouterProduit();
    
    abstract function supprimerProduit();
    
}