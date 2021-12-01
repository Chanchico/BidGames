<?php

namespace App\Entity;

use App\Repository\BuyingOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="integer")
     */
    private $id_buyorder;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $max_bid;

    /**
     * @ORM\OneToMany(targetEntity=product::class, mappedBy="buyingOrder")
     */
    private $id_product;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="buyingOrders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    public function __construct()
    {
        $this->id_product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBuyorder(): ?int
    {
        return $this->id_buyorder;
    }

    public function setIdBuyorder(int $id_buyorder): self
    {
        $this->id_buyorder = $id_buyorder;

        return $this;
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

    /**
     * @return Collection|product[]
     */
    public function getIdProduct(): Collection
    {
        return $this->id_product;
    }

    public function addIdProduct(product $idProduct): self
    {
        if (!$this->id_product->contains($idProduct)) {
            $this->id_product[] = $idProduct;
            $idProduct->setBuyingOrder($this);
        }

        return $this;
    }

    public function removeIdProduct(product $idProduct): self
    {
        if ($this->id_product->removeElement($idProduct)) {
            // set the owning side to null (unless already changed)
            if ($idProduct->getBuyingOrder() === $this) {
                $idProduct->setBuyingOrder(null);
            }
        }

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
}
