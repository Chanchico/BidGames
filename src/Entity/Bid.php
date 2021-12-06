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
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $bet;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="bid")
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

    public function getBet(): ?string
    {
        return $this->bet;
    }

    public function setBet(string $bet): self
    {
        $this->bet = $bet;

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

    /**
     * @return Collection|Product[]
     */
    public function getIdProduct(): Collection
    {
        return $this->id_product;
    }

    public function addIdProduct(Product $idProduct): self
    {
        if (!$this->id_product->contains($idProduct)) {
            $this->id_product[] = $idProduct;
            $idProduct->setBid($this);
        }

        return $this;
    }

    public function removeIdProduct(Product $idProduct): self
    {
        if ($this->id_product->removeElement($idProduct)) {
            // set the owning side to null (unless already changed)
            if ($idProduct->getBid() === $this) {
                $idProduct->setBid(null);
            }
        }

        return $this;
    }

    public function __toString(): string
    {
        return (string) $this->id;
    }
}
