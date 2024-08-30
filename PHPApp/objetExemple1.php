<?php
class Produit
{

    public $nom="mon Produit";
    public $quantite=10;
    public $prix=120;
    public $rupture=false;

    function afficherProduit()
    {
        return "Affichage du produit";
    }
    function ajouterProduit()
    {
        return "Un nouveau Produit est ajouté";
    }
    function supprimerProduit()
    {
        return "un Produit a été supprimé";
    }
}
$imprimante=new Produit;
$imprimante->nom="imprimante";
$imprimante->quantite=20;
$imprimante->prix=700;
$imprimante->rupture=false;
echo "Nom du produit: ".$imprimante->nom."<br>";
echo "Prix du produit: ".$imprimante->prix."<br>";
echo "Quantité du produit: ".$imprimante->quantite."<br>";
echo ($imprimante->rupture)?"Rupture de stock<br>":"En stock<br>";

echo $imprimante->afficherProduit().'<br>';
echo $imprimante->ajouterProduit().'<br>';;
echo $imprimante->supprimerProduit().'<br>';;
?>