<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="integer")
     */
    private $id_product;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $state;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $estimate_price;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $reserve_price;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\ManyToOne(targetEntity=sets::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_sets;

    /**
     * @ORM\ManyToOne(targetEntity=type::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_type;

    /**
     * @ORM\ManyToOne(targetEntity=BuyingOrder::class, inversedBy="id_product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $buyingOrder;

    /**
     * @ORM\ManyToOne(targetEntity=Bid::class, inversedBy="id_product")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bid;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduct(): ?int
    {
        return $this->id_product;
    }

    public function setIdProduct(int $id_product): self
    {
        $this->id_product = $id_product;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

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

    public function getIdUser(): ?users
    {
        return $this->id_user;
    }

    public function setIdUser(?users $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdSets(): ?sets
    {
        return $this->id_sets;
    }

    public function setIdSets(?sets $id_sets): self
    {
        $this->id_sets = $id_sets;

        return $this;
    }

    public function getIdType(): ?type
    {
        return $this->id_type;
    }

    public function setIdType(?type $id_type): self
    {
        $this->id_type = $id_type;

        return $this;
    }

    public function getBuyingOrder(): ?BuyingOrder
    {
        return $this->buyingOrder;
    }

    public function setBuyingOrder(?BuyingOrder $buyingOrder): self
    {
        $this->buyingOrder = $buyingOrder;

        return $this;
    }

    public function getBid(): ?Bid
    {
        return $this->bid;
    }

    public function setBid(?Bid $bid): self
    {
        $this->bid = $bid;

        return $this;
    }
}
