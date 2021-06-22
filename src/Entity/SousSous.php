<?php

namespace App\Entity;

use App\Repository\SousSousRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousSousRepository::class)
 */
class SousSous
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
     * @ORM\ManyToOne(targetEntity=SousFamille::class, inversedBy="sousSouses")
     */
    private $idSousFamille;

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

    public function getIdSousFamille(): ?SousFamille
    {
        return $this->idSousFamille;
    }

    public function setIdSousFamille(?SousFamille $idSousFamille): self
    {
        $this->idSousFamille = $idSousFamille;

        return $this;
    }
}
