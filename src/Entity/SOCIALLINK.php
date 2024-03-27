<?php

namespace App\Entity;

use App\Repository\SOCIALLINKRepository;
use Doctrine\ORM\Mapping as ORM;
use phpDocumentor\Reflection\Types\Nullable;

#[ORM\Entity(repositoryClass: SOCIALLINKRepository::class)]
class SOCIALLINK
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $url = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $icone = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): static
    {
        $this->url = $url;

        return $this;
    }

    public function getIcone(): ?string
    {
        return $this->icone;
    }

    public function setIcone(string $icone): static
    {
        $this->icone = $icone;

        return $this;
    }
}
