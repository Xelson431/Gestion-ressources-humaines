<?php

namespace App\Entity;

use App\Repository\DemandeCongeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DemandeCongeRepository::class)
 */
class DemandeConge
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
    private $MotifConge;

    /**
     * @return mixed
     */
    public function getMotifConge()
    {
        return $this->MotifConge;
    }

    /**
     * @param mixed $MotifConge
     */
    public function setMotifConge($MotifConge): void
    {
        $this->MotifConge = $MotifConge;
    }



    /**
     * @return mixed
     */
    public function getDateDepart()
    {
        return $this->DateDepart;
    }

    /**
     * @param mixed $DateDepart
     */
    public function setDateDepart($DateDepart): void
    {
        $this->DateDepart = $DateDepart;
    }
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateDepart;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateRetour;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $DateDemande;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $Etat;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Demandes")
     */
    private $user;





    public function __construct()
    {


        $this->setDateDemande(new \DateTime());

    }

//    /**
//     * @ORM\ManyToOne(targetEntity=Employees::class, inversedBy="demandeConges")
//     */
//    private $employee;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDateRetour()
    {
        return $this->DateRetour;
    }

    /**
     * @param mixed $DateRetour
     */
    public function setDateRetour($DateRetour): void
    {
        $this->DateRetour = $DateRetour;
    }





    public function getDateDemande(): ?\DateTimeInterface
    {
        return $this->DateDemande;
    }

    public function setDateDemande(?\DateTimeInterface $DateDemande): self
    {
        $this->DateDemande = $DateDemande;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->Etat;
    }

    public function setEtat(?string $Etat): self
    {
        $this->Etat = $Etat;

        return $this;
    }

//    public function getEmployee(): ?Employees
//    {
//        return $this->employee;
//    }
//
//    public function setEmployee(?Employees $employee): self
//    {
//        $this->employee = $employee;
//
//        return $this;
//    }

public function getUser(): ?User
{
    return $this->user;
}

public function setUser(?User $user): self
{
    $this->user = $user;

    return $this;
}




}
