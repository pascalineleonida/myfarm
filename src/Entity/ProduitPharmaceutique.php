<?php

namespace App\Entity;

use App\Repository\ProduitPharmaceutiqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitPharmaceutiqueRepository::class)]
class ProduitPharmaceutique
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'produitPharmaceutique', targetEntity: Assistance::class)]
    private Collection $Assistance;

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
            $assistance->setProduitPharmaceutique($this);
        }

        return $this;
    }

    public function removeAssistance(Assistance $assistance): static
    {
        if ($this->Assistance->removeElement($assistance)) {
            // set the owning side to null (unless already changed)
            if ($assistance->getProduitPharmaceutique() === $this) {
                $assistance->setProduitPharmaceutique(null);
            }
        }

        return $this;
    }
}
