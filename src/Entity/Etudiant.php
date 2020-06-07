<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EtudiantRepository::class)
 */
class Etudiant
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="integer")
     */
    private $Note;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->Note;
    }

    public function setNote(int $Note): self
    {
        $this->Note = $Note;

        return $this;
    }
}
