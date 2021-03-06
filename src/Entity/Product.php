<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;



    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $estimate_price;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $reserve_price;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\ManyToOne(targetEntity=Sets::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_sets;

    /**
     * @ORM\ManyToOne(targetEntity=Type::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_type;

    /**
     * @ORM\ManyToOne(targetEntity=Status::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_status;



    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }


    public function getEstimatePrice(): ?string
    {
        return $this->estimate_price;
    }

    public function setEstimatePrice(string $estimate_price): self
    {
        $this->estimate_price = $estimate_price;

        return $this;
    }

    public function getReservePrice(): ?string
    {
        return $this->reserve_price;
    }

    public function setReservePrice(string $reserve_price): self
    {
        $this->reserve_price = $reserve_price;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->id_user;
    }

    public function setIdUser(?User $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdSets(): ?Sets
    {
        return $this->id_sets;
    }

    public function setIdSets(?Sets $id_sets): self
    {
        $this->id_sets = $id_sets;

        return $this;
    }

    public function getIdType(): ?Type
    {
        return $this->id_type;
    }

    public function setIdType(?Type $id_type): self
    {
        $this->id_type = $id_type;

        return $this;
    }

    public function getIdStatus(): ?Status
    {
        return $this->id_status;
    }

    public function setIdStatus(?Status $id_status): self
    {
        $this->id_status = $id_status;

        return $this;
    }
}
