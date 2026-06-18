<?php

namespace App\Entity;

use App\Repository\VirementRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VirementRepository::class)]
class Virement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $emetteur = null;

    #[ORM\Column(length: 50)]
    private ?string $destinataire = null;

    #[ORM\Column(length: 50)]
    private ?string $date = null;

    #[ORM\Column]
    private ?float $montant = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmetteur(): ?string
    {
        return $this->emetteur;
    }

    public function setEmetteur(string $emetteur): static
    {
        $this->emetteur = $emetteur;

        return $this;
    }

    public function getDestinataire(): ?string
    {
        return $this->destinataire;
    }

    public function setDestinataire(string $destinataire): static
    {
        $this->destinataire = $destinataire;

        return $this;
    }

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(string $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $montant): static
    {
        $this->montant = $montant;

        return $this;
    }
}
