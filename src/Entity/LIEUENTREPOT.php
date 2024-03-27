<?php

namespace App\Entity;

use App\Repository\LIEUENTREPOTRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LIEUENTREPOTRepository::class)]
class LIEUENTREPOT
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column(length: 55)]
    private ?string $etagere = null;

    #[ORM\Column(nullable: true)]
    private ?int $etage = null;

    #[ORM\ManyToOne(inversedBy: 'lieuentrepot')]
    private ?ENTREPOT $entrepot = null;

    #[ORM\ManyToOne(inversedBy: 'lieuentrepot')]
    private ?PRODUIT $produit = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(?int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getEtagere(): ?string
    {
        return $this->etagere;
    }

    public function setEtagere(?string $etagere): static
    {
        $this->etagere = $etagere;

        return $this;
    }

    public function getEtage(): ?int
    {
        return $this->etage;
    }

    public function setEtage(?int $etage): static
    {
        $this->etage = $etage;

        return $this;
    }

    public function getEntrepot(): ?ENTREPOT
    {
        return $this->entrepot;
    }

    public function setEntrepot(?ENTREPOT $entrepot): static
    {
        $this->entrepot = $entrepot;

        return $this;
    }

    public function getProduit(): ?PRODUIT
    {
        return $this->produit;
    }

    public function setProduit(?PRODUIT $produit): static
    {
        $this->produit = $produit;

        return $this;
    }
}