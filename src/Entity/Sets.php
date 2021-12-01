<?php

namespace App\Entity;

use App\Repository\SetsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="integer")
     */
    private $id_sets;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $launch_date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_published;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\ManyToOne(targetEntity=city::class, inversedBy="sets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_city;

    /**
     * @ORM\ManyToOne(targetEntity=category::class, inversedBy="sets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_category;

    /**
     * @ORM\ManyToOne(targetEntity=users::class, inversedBy="sets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user_auctioneer;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="id_sets")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSets(): ?int
    {
        return $this->id_sets;
    }

    public function setIdSets(int $id_sets): self
    {
        $this->id_sets = $id_sets;

        return $this;
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

    public function getIsPublished(): ?bool
    {
        return $this->is_published;
    }

    public function setIsPublished(bool $is_published): self
    {
        $this->is_published = $is_published;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getIdCity(): ?city
    {
        return $this->id_city;
    }

    public function setIdCity(?city $id_city): self
    {
        $this->id_city = $id_city;

        return $this;
    }

    public function getIdCategory(): ?category
    {
        return $this->id_category;
    }

    public function setIdCategory(?category $id_category): self
    {
        $this->id_category = $id_category;

        return $this;
    }

    public function getIdUserAuctioneer(): ?users
    {
        return $this->id_user_auctioneer;
    }

    public function setIdUserAuctioneer(?users $id_user_auctioneer): self
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
}
