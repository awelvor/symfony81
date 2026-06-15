<?php

namespace App\Entity;

use App\Repository\EurosRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EurosRepository::class)]
class Euros
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $compte = null;

    #[ORM\Column(length: 10)]
    private ?string $date = null;

    #[ORM\Column(length: 50)]
    private ?string $libelle = null;

    #[ORM\Column(nullable: true)]
    private ?float $credit = null;

    #[ORM\Column(nullable: true)]
    private ?float $debit = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $banque = null;

    #[ORM\Column(length: 50)]
    private ?string $budget = null;

    #[ORM\Column(nullable: true)]
    private ?int $cheque = null;

    #[ORM\Column(length: 7, nullable: true)]
    private ?string $cbid = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompte(): ?string
    {
        return $this->compte;
    }

    public function setCompte(string $compte): static
    {
        $this->compte = $compte;

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

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getCredit(): ?float
    {
        return $this->credit;
    }

    public function setCredit(?float $credit): static
    {
        $this->credit = $credit;

        return $this;
    }

    public function getDebit(): ?float
    {
        return $this->debit;
    }

    public function setDebit(?float $debit): static
    {
        $this->debit = $debit;

        return $this;
    }

    public function getBanque(): ?string
    {
        return $this->banque;
    }

    public function setBanque(?string $banque): static
    {
        $this->banque = $banque;

        return $this;
    }

    public function getBudget(): ?string
    {
        return $this->budget;
    }

    public function setBudget(string $budget): static
    {
        $this->budget = $budget;

        return $this;
    }

    public function getCheque(): ?int
    {
        return $this->cheque;
    }

    public function setCheque(?int $cheque): static
    {
        $this->cheque = $cheque;

        return $this;
    }

    public function getCbid(): ?string
    {
        return $this->cbid;
    }

    public function setCbid(?string $cbid): static
    {
        $this->cbid = $cbid;

        return $this;
    }
}
