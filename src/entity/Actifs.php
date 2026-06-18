<?php

namespace App\Entity;

use App\Repository\ActifsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActifsRepository::class)]
class Actifs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(nullable: true)]
    private ?int $c1 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c2 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c3 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c4 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c5 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c6 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c7 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c8 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c9 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c10 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c11 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c12 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c13 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c14 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c15 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c16 = null;

    #[ORM\Column(nullable: true)]
    private ?int $c17 = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(?\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getC1(): ?int
    {
        return $this->c1;
    }

    public function setC1(?int $c1): static
    {
        $this->c1 = $c1;

        return $this;
    }

    public function getC2(): ?int
    {
        return $this->c2;
    }

    public function setC2(?int $c2): static
    {
        $this->c2 = $c2;

        return $this;
    }

    public function getC3(): ?int
    {
        return $this->c3;
    }

    public function setC3(?int $c3): static
    {
        $this->c3 = $c3;

        return $this;
    }

    public function getC4(): ?int
    {
        return $this->c4;
    }

    public function setC4(?int $c4): static
    {
        $this->c4 = $c4;

        return $this;
    }

    public function getC5(): ?int
    {
        return $this->c5;
    }

    public function setC5(?int $c5): static
    {
        $this->c5 = $c5;

        return $this;
    }

    public function getC6(): ?int
    {
        return $this->c6;
    }

    public function setC6(?int $c6): static
    {
        $this->c6 = $c6;

        return $this;
    }

    public function getC7(): ?int
    {
        return $this->c7;
    }

    public function setC7(?int $c7): static
    {
        $this->c7 = $c7;

        return $this;
    }

    public function getC8(): ?int
    {
        return $this->c8;
    }

    public function setC8(?int $c8): static
    {
        $this->c8 = $c8;

        return $this;
    }

    public function getC9(): ?int
    {
        return $this->c9;
    }

    public function setC9(?int $c9): static
    {
        $this->c9 = $c9;

        return $this;
    }

    public function getC10(): ?int
    {
        return $this->c10;
    }

    public function setC10(?int $c10): static
    {
        $this->c10 = $c10;

        return $this;
    }

    public function getC11(): ?int
    {
        return $this->c11;
    }

    public function setC11(?int $c11): static
    {
        $this->c11 = $c11;

        return $this;
    }

    public function getC12(): ?int
    {
        return $this->c12;
    }

    public function setC12(?int $c12): static
    {
        $this->c12 = $c12;

        return $this;
    }

    public function getC13(): ?int
    {
        return $this->c13;
    }

    public function setC13(?int $c13): static
    {
        $this->c13 = $c13;

        return $this;
    }

    public function getC14(): ?int
    {
        return $this->c14;
    }

    public function setC14(?int $c14): static
    {
        $this->c14 = $c14;

        return $this;
    }

    public function getC15(): ?int
    {
        return $this->c15;
    }

    public function setC15(?int $c15): static
    {
        $this->c15 = $c15;

        return $this;
    }

    public function getC16(): ?int
    {
        return $this->c16;
    }

    public function setC16(?int $c16): static
    {
        $this->c16 = $c16;

        return $this;
    }

    public function getC17(): ?int
    {
        return $this->c17;
    }

    public function setC17(?int $c17): static
    {
        $this->c17 = $c17;

        return $this;
    }
}
