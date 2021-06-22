<?php

namespace App\Entity;

use App\Repository\SousFamilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousFamilleRepository::class)
 */
class SousFamille
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Famille::class, inversedBy="sousFamilles")
     */
    private $idFamille;

    /**
     * @ORM\OneToMany(targetEntity=SousSous::class, mappedBy="idSousFamille")
     */
    private $sousSouses;

    public function __construct()
    {
        $this->sousSouses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(?string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getIdFamille(): ?Famille
    {
        return $this->idFamille;
    }

    public function setIdFamille(?Famille $idFamille): self
    {
        $this->idFamille = $idFamille;

        return $this;
    }

    public function __toString()
    {
        return $this->libelle;
    }

    /**
     * @return Collection|SousSous[]
     */
    public function getSousSouses(): Collection
    {
        return $this->sousSouses;
    }

    public function addSousSouse(SousSous $sousSouse): self
    {
        if (!$this->sousSouses->contains($sousSouse)) {
            $this->sousSouses[] = $sousSouse;
            $sousSouse->setIdSousFamille($this);
        }

        return $this;
    }

    public function removeSousSouse(SousSous $sousSouse): self
    {
        if ($this->sousSouses->removeElement($sousSouse)) {
            // set the owning side to null (unless already changed)
            if ($sousSouse->getIdSousFamille() === $this) {
                $sousSouse->setIdSousFamille(null);
            }
        }

        return $this;
    }
}
