<?php

namespace App\Entity;

use App\Repository\AssistanceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AssistanceRepository::class)]
class Assistance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $message = null;

    #[ORM\Column(length: 255)]
    private ?string $reponse = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\ManyToOne(inversedBy: 'Assistance')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Patients $patients = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'patient')]
    #[ORM\JoinColumn(nullable: false)]
    private ?self $assistance = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getReponse(): ?string
    {
        return $this->reponse;
    }

    public function setReponse(string $reponse): static
    {
        $this->reponse = $reponse;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getPatients(): ?Patients
    {
        return $this->patients;
    }

    public function setPatients(?Patients $patients): static
    {
        $this->patients = $patients;

        return $this;
    }

    public function getAssistance(): ?self
    {
        return $this->assistance;
    }

    public function setAssistance(?self $assistance): static
    {
        $this->assistance = $assistance;

        return $this;
    }
}
