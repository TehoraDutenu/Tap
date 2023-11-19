<?php

namespace App\Entity;

use App\Repository\DomaineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DomaineRepository::class)]
class Domaine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $zipCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $website = null;

    #[ORM\Column]
    private ?bool $is_online = null;

    #[ORM\OneToOne(mappedBy: 'domaine', cascade: ['persist', 'remove'])]
    private ?Representant $representant = null;

    #[ORM\ManyToMany(targetEntity: ActiviteDomaine::class, mappedBy: 'domaine')]
    private Collection $activiteDomaines;

    public function __construct()
    {
        $this->activiteDomaines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): static
    {
        $this->address = $address;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->zipCode;
    }

    public function setZipCode(string $zipCode): static
    {
        $this->zipCode = $zipCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(?string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function isIsOnline(): ?bool
    {
        return $this->is_online;
    }

    public function setIsOnline(bool $is_online): static
    {
        $this->is_online = $is_online;

        return $this;
    }

    public function getRepresentant(): ?Representant
    {
        return $this->representant;
    }

    public function setRepresentant(Representant $representant): static
    {
        // set the owning side of the relation if necessary
        if ($representant->getDomaine() !== $this) {
            $representant->setDomaine($this);
        }

        $this->representant = $representant;

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
            $activiteDomaine->addDomaine($this);
        }

        return $this;
    }

    public function removeActiviteDomaine(ActiviteDomaine $activiteDomaine): static
    {
        if ($this->activiteDomaines->removeElement($activiteDomaine)) {
            $activiteDomaine->removeDomaine($this);
        }

        return $this;
    }
}
