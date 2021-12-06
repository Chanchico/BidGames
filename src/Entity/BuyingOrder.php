<?php

namespace App\Entity;

use App\Repository\BuyingOrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BuyingOrderRepository::class)
 */
class BuyingOrder
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $max_bid;

    /**
     * @ORM\OneToOne(targetEntity=Product::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_product;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="buyingOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaxBid(): ?string
    {
        return $this->max_bid;
    }

    public function setMaxBid(string $max_bid): self
    {
        $this->max_bid = $max_bid;

        return $this;
    }

    public function getIdProduct(): ?Product
    {
        return $this->id_product;
    }

    public function setIdProduct(Product $id_product): self
    {
        $this->id_product = $id_product;

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
}
