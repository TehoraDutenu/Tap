<?php

namespace App\Entity;

use App\Repository\ActiviteDomaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteDomaineRepository::class)]
class ActiviteDomaine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: Domaine::class, inversedBy: 'activiteDomaines')]
    private Collection $domaine;

    #[ORM\ManyToMany(targetEntity: Activite::class, inversedBy: 'activiteDomaines')]
    private Collection $activite;

    public function __construct()
    {
        $this->domaine = new ArrayCollection();
        $this->activite = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Domaine>
     */
    public function getDomaine(): Collection
    {
        return $this->domaine;
    }

    public function addDomaine(Domaine $domaine): static
    {
        if (!$this->domaine->contains($domaine)) {
            $this->domaine->add($domaine);
        }

        return $this;
    }

    public function removeDomaine(Domaine $domaine): static
    {
        $this->domaine->removeElement($domaine);

        return $this;
    }

    /**
     * @return Collection<int, Activite>
     */
    public function getActivite(): Collection
    {
        return $this->activite;
    }

    public function addActivite(Activite $activite): static
    {
        if (!$this->activite->contains($activite)) {
            $this->activite->add($activite);
        }

        return $this;
    }

    public function removeActivite(Activite $activite): static
    {
        $this->activite->removeElement($activite);

        return $this;
    }
}
