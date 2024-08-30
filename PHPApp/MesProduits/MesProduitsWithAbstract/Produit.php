<?php
namespace MesProduits\MesProduitsWithAbstract;
class Produit extends ProduitAbstract
{
   


    function __construct(string $nom,int $quantite,float $prix,bool $rupture=false)
    {

        $this->nom=$nom;
        $this->quantite=$quantite;
        $this->prix=$prix;
        $this->rupture=$rupture;
        self::$nbProduits++;

    }
    

    function getNom()
    {
        return $this->nom;

    }

    function setNom($valeur)
    {
        if (!is_string($valeur)){
            echo "la propriété nom doit être un chaîne de caractères";
        }
         else {
            $this->nom=$valeur;
        }

    }
    function getQuantite()
    {
        return $this->quantite;

    }

    function setQuantite($valeur)
    {
        if (!is_integer($valeur)){
            echo "La propriété quantite doit être un entier";
        }
         else {
            $this->quantite=$valeur;
        }

    }

    function getprix()
    {
        return $this->prix;

    }

    function setprix($valeur)
    {
        if (!is_numeric($valeur)){
            echo "La propriété prix doit être un nombre";
        }
         else {
            $this->prix=$valeur;
        }

    }


    function __toString()
    {
        return "Nom: ".$this->nom.'<br>'.
               "Prix: ".$this->prix.self::DEVISE.'<br>'.
               "Quantité: ".$this->quantite.'<br>'.
               (($this->rupture)?"Rupture de stock<br>":"En 				stock<br>");
    }
    function ajouterProduit()
    {
        $this->quantite+=1;
        if($this->quantite>0) $this->rupture=false;
    }
    function supprimerProduit()
    {
        $this->quantite-=1;
        if($this->quantite<=0){
            $this->quantite=0;
            $this->rupture=true;
        }
    }

}
