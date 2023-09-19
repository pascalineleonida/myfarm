<?php

namespace App\Entity;

use App\Repository\PharmacieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PharmacieRepository::class)]
class Pharmacie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    // #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'commande')]
    // #[ORM\JoinColumn(nullable: false)]
    // private ?self $pharmacie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): static
    {
        $this->specialite = $specialite;

        return $this;
    }

    // public function getPharmacie(): ?self
    // {
    //     return $this->pharmacie;
    // }

    // public function setPharmacie(?self $pharmacie): static
    // {
    //     $this->pharmacie = $pharmacie;

    //     return $this;
    // }
}
