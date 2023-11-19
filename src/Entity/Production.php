<?php

namespace App\Entity;

use App\Repository\ProductionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductionRepository::class)]
class Production
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $is_all_bio = null;

    #[ORM\Column]
    private ?bool $have_bio = null;

    #[ORM\Column]
    private ?bool $have_sulfite = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Domaine $domaine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isIsAllBio(): ?bool
    {
        return $this->is_all_bio;
    }

    public function setIsAllBio(bool $is_all_bio): static
    {
        $this->is_all_bio = $is_all_bio;

        return $this;
    }

    public function isHaveBio(): ?bool
    {
        return $this->have_bio;
    }

    public function setHaveBio(bool $have_bio): static
    {
        $this->have_bio = $have_bio;

        return $this;
    }

    public function isHaveSulfite(): ?bool
    {
        return $this->have_sulfite;
    }

    public function setHaveSulfite(bool $have_sulfite): static
    {
        $this->have_sulfite = $have_sulfite;

        return $this;
    }

    public function getDomaine(): ?Domaine
    {
        return $this->domaine;
    }

    public function setDomaine(Domaine $domaine): static
    {
        $this->domaine = $domaine;

        return $this;
    }
}
