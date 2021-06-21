<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @method string getUserIdentifier()
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")

 */
class User  implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json", length=255, nullable=true)
     */
    private $roles;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */





    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $grade;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $departement;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Salaire;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cin;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_embauche;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_naissance;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }
//entity
    private $role;

    /**
     * @ORM\OneToMany(targetEntity=DemandeConge::class, mappedBy="user")
     */
    private $Demandes;

    public function __construct()
    {
        $this->Demandes = new ArrayCollection();
    }






    public function setRole($role){
        $this->roles = $role;
        return $this;
    }

    public function getRole(){
        return $this->roles;
    }
    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(?string $roles): self
    {
        $this->roles = $roles;
        return $this;

    }


    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getSalt()
    {
         return ' ' ;
    }

    public function eraseCredentials()
    {
        return ' ' ;
    }

    public function getUsername(): ?string
    {
        return $this->email;
    }

    public function __call($name, $arguments)
    {
        return $this ;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(?string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getDepartement(): ?string
    {
        return $this->departement;
    }

    public function setDepartement(?string $departement): self
    {
        $this->departement = $departement;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->Salaire;
    }

    public function setSalaire(?int $Salaire): self
    {
        $this->Salaire = $Salaire;

        return $this;
    }

    public function getCin(): ?string
    {
        return $this->cin;
    }

    public function setCin(?string $cin): self
    {
        $this->cin = $cin;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->date_embauche;
    }

    public function setDateEmbauche(?\DateTimeInterface $date_embauche): self
    {
        $this->date_embauche = $date_embauche;

        return $this;
    }

    public function getDateNaissance(): ?\DateTimeInterface
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(?\DateTimeInterface $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    /**
     * @return Collection|DemandeConge[]
     */
    public function getDemandes(): Collection
    {
        return $this->Demandes;
    }

    public function addDemande(DemandeConge $demande): self
    {
        if (!$this->Demandes->contains($demande)) {
            $this->Demandes[] = $demande;
            $demande->setUser($this);
        }

        return $this;
    }

    public function addRole(String $role): self
    {
        $this->roles[] = $role;


        return $this;
    }

    public function removeDemande(DemandeConge $demande): self
    {
        if ($this->Demandes->removeElement($demande)) {
            // set the owning side to null (unless already changed)
            if ($demande->getUser() === $this) {
                $demande->setUser(null);
            }
        }

        return $this;
    }






    
}
