<?php
class Produit
{

    public $nom="mon Produit";
    public $quantite=3;
    public $prix=120;
    public $rupture=false;

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

$imprimante=new Produit;
$imprimante->nom="imprimante";
$imprimante->quantite=50;
$imprimante->prix=800;
echo $imprimante;

?>