<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActiviteRepository::class)]
class Activite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $label = null;

    #[ORM\ManyToMany(targetEntity: ActiviteDomaine::class, mappedBy: 'activite')]
    private Collection $activiteDomaines;

    public function __construct()
    {
        $this->activiteDomaines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): static
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return Collection<int, ActiviteDomaine>
     */
    public function getActiviteDomaines(): Collection
    {
        return $this->activiteDomaines;
    }

    public function addActiviteDomaine(ActiviteDomaine $activiteDomaine): static
    {
        if (!$this->activiteDomaines->contains($activiteDomaine)) {
            $this->activiteDomaines->add($activiteDomaine);
            $activiteDomaine->addActivite($this);
        }

        return $this;
    }

    public function removeActiviteDomaine(ActiviteDomaine $activiteDomaine): static
    {
        if ($this->activiteDomaines->removeElement($activiteDomaine)) {
            $activiteDomaine->removeActivite($this);
        }

        return $this;
    }
}
