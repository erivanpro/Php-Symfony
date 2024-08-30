<?php
class Produit
{

    private $nom="mon Produit";
    private $quantite=3;
    private $prix=120;
    private $rupture=false;

    function __construct($nom,$quantite,$prix,$rupture=false)
    {

        $this->nom=$nom;
        $this->quantite=$quantite;
        $this->prix=$prix;
        $this->rupture=$rupture;


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
               "Prix: ".$this->prix.'<br>'.
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

$imprimante=new Produit("imprimante",10,850.5);
echo $imprimante;

?>