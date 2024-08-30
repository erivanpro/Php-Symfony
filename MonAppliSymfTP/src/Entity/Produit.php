<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Validator\Antispam as Antispam;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ProduitRepository")
 * @UniqueEntity(fields="nom",message="erreur produit déjà existant", groups={"registration"})
 * @ORM\HasLifecycleCallbacks()
 */
class Produit 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * 
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=200)
     * 
     * @Assert\Length(
     *      min = 2,
     *      max = 100,
     *      minMessage = "produit.nom.min",
     *      maxMessage = "produit.nom.max",
     *     groups={"all"}
     * )
     *  @Antispam(message="Votre nom de produit: %string% ne doit contenir que des caractères alphanumériques",groups={"all"})
     */
    private $nom;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantite;

    

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lienImage;

    /**
    *@ORM\OneToOne(targetEntity="App\Entity\Reference", fetch="EAGER", cascade={"persist"})
    * @ORM\JoinColumn(nullable=true)
    */
    private $reference;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Distributeur", inversedBy="produit" ,cascade={"persist"} )
     * @ORM\JoinColumn(nullable=true)
     */
    private $distributeurs;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rupture;

     /**
    * 
    * @Assert\IsTrue(message="Erreur valeurs négatives sur le prix ou la quantite")
    * 
    */
   public function isPrixQuantiteValid()
   {
        if (is_float($this->getPrix()) && (is_int($this->getQuantite()))
        && ($this->getPrix()>0) && ($this->getQuantite()>0)) {
            return true;
        } else {
            return false;
        }


   }  

    /**
    * @Assert\Callback()
    * 
    * 
    */
    public function isContentValid(ExecutionContextInterface $context)
    {
        $forbiddenWords= array('arme','médicament');
        if(preg_match('#'.implode('|',$forbiddenWords).'#i', $this->getNom())){

            // erreur de validation

            $context->buildViolation('Le produit est interdit à la vente')
                    ->atPath('produit')
                    ->addViolation();
    }

    }

    

    public function __construct()
    {
        $this->distributeurs = new ArrayCollection();
    }

  
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    
    public function getLienImage(): ?string
    {
        return $this->lienImage;
    }

    public function setLienImage(string $lienImage): self
    {
        $this->lienImage = $lienImage;

        return $this;
    }

    public function getReference(): ?Reference
    {
        return $this->reference;
    }

    public function setReference(?Reference $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * @return Collection|Distributeur[]
     */
    public function getDistributeurs(): Collection
    {
        return $this->distributeurs;
    }

    public function addDistributeur(Distributeur $distributeur): self
    {
        if (!$this->distributeurs->contains($distributeur)) {
            $this->distributeurs[] = $distributeur;
            $distributeur->addProduit($this);
        }

        return $this;
    }

    public function removeDistributeur(Distributeur $distributeur): self
    {
        if ($this->distributeurs->contains($distributeur)) {
            $this->distributeurs->removeElement($distributeur);
        }

        return $this;
    }

    public function getRupture(): ?bool
    {
        return $this->rupture;
    }

    public function setRupture(bool $rupture): self
    {
        $this->rupture = $rupture;

        return $this;
    }

  
   

}
