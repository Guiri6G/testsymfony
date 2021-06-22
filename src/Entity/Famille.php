<?php

namespace App\Entity;

use App\Repository\FamilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FamilleRepository::class)
 */
class Famille
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
     * @ORM\OneToMany(targetEntity=SousFamille::class, mappedBy="idFamille")
     */
    private $sousFamilles;

    public function __construct()
    {
        $this->sousFamilles = new ArrayCollection();
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

    /**
     * @return Collection|SousFamille[]
     */
    public function getSousFamilles(): Collection
    {
        return $this->sousFamilles;
    }

    public function addSousFamille(SousFamille $sousFamille): self
    {
        if (!$this->sousFamilles->contains($sousFamille)) {
            $this->sousFamilles[] = $sousFamille;
            $sousFamille->setIdFamille($this);
        }

        return $this;
    }

    public function removeSousFamille(SousFamille $sousFamille): self
    {
        if ($this->sousFamilles->removeElement($sousFamille)) {
            // set the owning side to null (unless already changed)
            if ($sousFamille->getIdFamille() === $this) {
                $sousFamille->setIdFamille(null);
            }
        }

        return $this;
    }
}
