<?php

namespace App\Entity;

use App\Repository\ProjetsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProjetsRepository::class)
 */
class Projets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Projet;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Statut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Departement;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateDebut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateFin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProjet(): ?string
    {
        return $this->Projet;
    }

    public function setProjet(?string $Projet): self
    {
        $this->Projet = $Projet;

        return $this;
    }

    public function getStatut(): ?string
    {
        return $this->Statut;
    }

    public function setStatut(?string $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->Departement;
    }

    public function setDepartement(string $Departement): self
    {
        $this->Departement = $Departement;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->DateDebut;
    }

    public function setDateDebut(?\DateTimeInterface $DateDebut): self
    {
        $this->DateDebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->DateFin;
    }

    public function setDateFin(?\DateTimeInterface $DateFin): self
    {
        $this->DateFin = $DateFin;

        return $this;
    }
}
