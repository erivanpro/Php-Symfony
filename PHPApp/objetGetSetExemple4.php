<?php
class Produit
{

    private $nom="mon Produit";
    private $quantite=3;
    private $prix=120;
    private $rupture=false;

    function __get($nomPropriete)
    {
        return $this->$nomPropriete;

    }

    function __set($nomPropriete, $valeur)
    {
        if ($nomPropriete=="nom" && !is_string($valeur)){
            echo "La propriété nom doit être une chaîne de caractères";
        } else if($nomPropriete=="quantite" && !is_int($valeur)){
            echo "La propriété quantite doit être un entier";
        } else if($nomPropriete=="prix" && !is_numeric($valeur)){
            echo "La propriété prix doit être un nombre";
        } 
        else if($nomPropriete=="rupture" && !is_bool($valeur)){
            echo "La propriété prix doit être un nombre";
        } else {
            $this->$nomPropriete=$valeur;
        }

    }

    function __toString()
    {
        return "Nom: ".$this->nom.'<br>'.
               "Prix: ".$this->prix.'<br>'.
               "Quantité: ".$this->quantite.'<br>'.
               (($this->rupture)?"Rupture de stock<br>":"En stock<br>");
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

$imprimante=new Produit;
$imprimante->nom="imprimante";
$imprimante->quantite=12;
$imprimante->prix=1200.4;
echo $imprimante;

?>