<?php

namespace App\Entity;

use App\Repository\BidRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BidRepository::class)
 */
class Bid
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
    private $id_bid;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $bet;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="bids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\OneToMany(targetEntity=product::class, mappedBy="bid")
     */
    private $id_product;

    public function __construct()
    {
        $this->id_product = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdBid(): ?int
    {
        return $this->id_bid;
    }

    public function setIdBid(int $id_bid): self
    {
        $this->id_bid = $id_bid;

        return $this;
    }

    public function getBet(): ?string
    {
        return $this->bet;
    }

    public function setBet(string $bet): self
    {
        $this->bet = $bet;

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
            $idProduct->setBid($this);
        }

        return $this;
    }

    public function removeIdProduct(product $idProduct): self
    {
        if ($this->id_product->removeElement($idProduct)) {
            // set the owning side to null (unless already changed)
            if ($idProduct->getBid() === $this) {
                $idProduct->setBid(null);
            }
        }

        return $this;
    }
}
