<?php

namespace App\Entity;

use App\Repository\PatientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PatientsRepository::class)]
class Patients
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'patients', targetEntity: Assistance::class)]
    private Collection $Assistance;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    public function __construct()
    {
        $this->Assistance = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Assistance>
     */
    public function getAssistance(): Collection
    {
        return $this->Assistance;
    }

    public function addAssistance(Assistance $assistance): static
    {
        if (!$this->Assistance->contains($assistance)) {
            $this->Assistance->add($assistance);
            $assistance->setPatients($this);
        }

        return $this;
    }

    public function removeAssistance(Assistance $assistance): static
    {
        if ($this->Assistance->removeElement($assistance)) {
            // set the owning side to null (unless already changed)
            if ($assistance->getPatients() === $this) {
                $assistance->setPatients(null);
            }
        }

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }
}
