<?php

namespace App\Entity;

use App\Repository\EmployeesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EmployeesRepository::class)
 */
class Employees extends  User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;



    /**
     * @ORM\Column(type="text")
     */
    private $cin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="text")
     */
    private $grade;

    /**
     * @ORM\Column(type="text")
     */
    private $departement;

    /**
     * @ORM\Column(type="text")
     */
    private $tel;

    /**
     * @ORM\Column(type="date")
     */
    private $DateEmbauche;

    /**
     * @ORM\Column(type="date")
     */
    private $DateNaissance;

    /**
     * @return mixed
     */
    public function getDateEmbauche()
    {
        return $this->DateEmbauche;
    }

    /**
     * @param mixed $DateEmbauche
     */
    public function setDateEmbauche($DateEmbauche): void
    {
        $this->DateEmbauche = $DateEmbauche;
    }

    /**
     * @return mixed
     */
    public function getDateNaissance()
    {
        return $this->DateNaissance;
    }

    /**
     * @param mixed $DateNaissance
     */
    public function setDateNaissance($DateNaissance): void
    {
        $this->DateNaissance = $DateNaissance;
    }






    /**
     * @ORM\Column(type="text")
     */
    private $adresse;

    /**
     * @ORM\Column(type="text")
     */
    private $pass;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $admin;



    /**
     * @ORM\Column(type="text")
     */
    private $salaire;

    /**
     * @ORM\OneToMany(targetEntity=DemandeConge::class, mappedBy="employee")
     */
    private $demandeConges;

    public function __construct()
    {
        $this->demandeConges = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getSalaire()
    {
        return $this->salaire;
    }

    /**
     * @param mixed $salaire
     */
    public function setSalaire($salaire): void
    {
        $this->salaire = $salaire;
    }

    public function getId(): ?int
    {
        return $this->id;
    }



    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(string $cin): self
    {
        $this->cin = $cin;

        return $this;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getPass(): ?string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }

    public function getAdmin(): ?int
    {
        return $this->admin;
    }

    public function setAdmin(?int $admin): self
    {
        $this->admin = $admin;

        return $this;
    }



    /**
     * @return Collection|DemandeConge[]
     */
    public function getDemandeConges(): Collection
    {
        return $this->demandeConges;
    }

    public function addDemandeConge(DemandeConge $demandeConge): self
    {
        if (!$this->demandeConges->contains($demandeConge)) {
            $this->demandeConges[] = $demandeConge;
            $demandeConge->setEmployee($this);
        }

        return $this;
    }

    public function removeDemandeConge(DemandeConge $demandeConge): self
    {
        if ($this->demandeConges->removeElement($demandeConge)) {
            // set the owning side to null (unless already changed)
            if ($demandeConge->getEmployee() === $this) {
                $demandeConge->setEmployee(null);
            }
        }

        return $this;
    }
}
