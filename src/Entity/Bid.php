<?php

namespace App\Entity;

use App\Repository\BidRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="bids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="bid")
     */
    private $id_product;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="bids")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_category;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_published;

    /**
     * @ORM\OneToMany(targetEntity=Sets::class, mappedBy="id_bid")
     */
    private $sets;

    public function __construct()
    {
        $this->id_product = new ArrayCollection();
        $this->sets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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


    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function getIdCategory(): ?Category
    {
        return $this->id_category;
    }

    public function setIdCategory(?Category $id_category): self
    {
        $this->id_category = $id_category;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->is_published;
    }

    public function setIsPublished(bool $is_published): self
    {
        $this->is_published = $is_published;

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
            $set->setIdBid($this);
        }

        return $this;
    }

    public function removeSet(Sets $set): self
    {
        if ($this->sets->removeElement($set)) {
            // set the owning side to null (unless already changed)
            if ($set->getIdBid() === $this) {
                $set->setIdBid(null);
            }
        }

        return $this;
    }
}
