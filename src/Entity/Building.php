<?php

namespace App\Entity;

use App\Repository\BuildingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BuildingRepository::class)]
class Building
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::GUID)]
    private ?string $uuid = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    /**
     * @var Collection<int, Employe>
     */
    #[ORM\OneToMany(mappedBy: 'building', targetEntity: Employe::class)]
    private Collection $person;

    public function __construct()
    {
        $this->person = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid): static
    {
        $this->uuid = $uuid;

        return $this;
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

    /**
     * @return Collection<int, Employe>
     */
    public function getPerson(): Collection
    {
        return $this->person;
    }

    public function addPerson(Employe $person): static
    {
        if (!$this->person->contains($person)) {
            $this->person->add($person);
            $person->setBuilding($this);
        }

        return $this;
    }

    public function removePerson(Employe $person): static
    {
        if ($this->person->removeElement($person)) {
            // set the owning side to null (unless already changed)
            if ($person->getBuilding() === $this) {
                $person->setBuilding(null);
            }
        }

        return $this;
    }
}
