<?php

namespace App\Entity;

use App\Repository\SetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
/**
 * @ORM\Entity(repositoryClass=SetsRepository::class)
 */
class Sets
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $launch_date;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @ApiSubresource
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="sets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_city;

    /**
     * @ORM\ManyToMany(targetEntity=Category::class)
     */
    private $id_category;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user_auctioneer;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="id_sets")
     */
    private $products;

    /**
     * @ORM\ManyToOne(targetEntity=Bid::class, inversedBy="sets")
     */
    private $id_bid;

    public function __construct()
    {
        $this->id_category = new ArrayCollection();
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLaunchDate(): ?\DateTimeInterface
    {
        return $this->launch_date;
    }

    public function setLaunchDate(?\DateTimeInterface $launch_date): self
    {
        $this->launch_date = $launch_date;

        return $this;
    }



    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getIdCity(): ?City
    {
        return $this->id_city;
    }

    public function setIdCity(?City $id_city): self
    {
        $this->id_city = $id_city;

        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getIdCategory(): Collection
    {
        return $this->id_category;
    }

    public function addIdCategory(Category $idCategory): self
    {
        if (!$this->id_category->contains($idCategory)) {
            $this->id_category[] = $idCategory;
        }

        return $this;
    }

    public function removeIdCategory(Category $idCategory): self
    {
        $this->id_category->removeElement($idCategory);

        return $this;
    }

    public function getIdUserAuctioneer(): ?User
    {
        return $this->id_user_auctioneer;
    }

    public function setIdUserAuctioneer(?User $id_user_auctioneer): self
    {
        $this->id_user_auctioneer = $id_user_auctioneer;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
            $product->setIdSets($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getIdSets() === $this) {
                $product->setIdSets(null);
            }
        }

        return $this;
    }
    public function __toString(): string
    {
        return (string) $this->id;
    }

    public function getIdBid(): ?Bid
    {
        return $this->id_bid;
    }

    public function setIdBid(?Bid $id_bid): self
    {
        $this->id_bid = $id_bid;

        return $this;
    }

}
