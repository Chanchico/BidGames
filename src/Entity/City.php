<?php

namespace App\Entity;

use App\Repository\CityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CityRepository::class)
 */
class City
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_city;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $code;

    /**
     * @ORM\ManyToOne(targetEntity=departement::class, inversedBy="cities")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_departement;

    /**
     * @ORM\OneToMany(targetEntity=Users::class, mappedBy="id_city")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=Sets::class, mappedBy="id_city")
     */
    private $sets;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->sets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCity(): ?int
    {
        return $this->id_city;
    }

    public function setIdCity(int $id_city): self
    {
        $this->id_city = $id_city;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCode(): ?int
    {
        return $this->code;
    }

    public function setCode(int $code): self
    {
        $this->code = $code;

        return $this;
    }

    public function getIdDepartement(): ?departement
    {
        return $this->id_departement;
    }

    public function setIdDepartement(?departement $id_departement): self
    {
        $this->id_departement = $id_departement;

        return $this;
    }

    /**
     * @return Collection|Users[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(Users $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setIdCity($this);
        }

        return $this;
    }

    public function removeUser(Users $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getIdCity() === $this) {
                $user->setIdCity(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Sets[]
     */
    public function getSets(): Collection
    {
        return $this->sets;
    }

    public function addSet(Sets $set): self
    {
        if (!$this->sets->contains($set)) {
            $this->sets[] = $set;
            $set->setIdCity($this);
        }

        return $this;
    }

    public function removeSet(Sets $set): self
    {
        if ($this->sets->removeElement($set)) {
            // set the owning side to null (unless already changed)
            if ($set->getIdCity() === $this) {
                $set->setIdCity(null);
            }
        }

        return $this;
    }
}