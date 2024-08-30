<?php
namespace MesProduits;
class ProduitParLots extends Produit
{

   
    private $nbArticlesParLot;

    
    function __construct(string $nom,int $quantite,int 	$nbArticlesParLot, float $prix,bool $rupture=false)
    {

        $this->nbArticlesParLot=$nbArticlesParLot;
        parent::__construct($nom,$quantite,$prix,$rupture);

    }

    function ajouterProduit()
    {
        $this->quantite+=$this->nbArticlesParLot;
        if($this->quantite>0) $this->rupture=false;
    }

    function supprimerProduit()
    {
        $this->quantite-=$this->nbArticlesParLot;
        if($this->quantite<=0){
            $this->quantite=0;
            $this->rupture=true;
        }
    }

    function getNbArticlesParLot()
    {
        return $this->nbArticlesParLot;

    }

    function setNbArticlesParLot($valeur)
    {
        if (!is_integer($valeur)){
            echo "la propriété nbArticlesParLot doit être un entier";
        }
         else {
            $this->nbArticlesParLot=$valeur;
        }

    }
   

}
