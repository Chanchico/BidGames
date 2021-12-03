<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 */
class Users
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date")
     */
    private $birthdate;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $licence;

    /**
     * @ORM\ManyToOne(targetEntity=City::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_city;

    /**
     * @ORM\OneToMany(targetEntity=Sets::class, mappedBy="id_user_auctioneer")
     */
    private $sets;

    /**
     * @ORM\OneToMany(targetEntity=Product::class, mappedBy="id_user")
     */
    private $products;

    /**
     * @ORM\OneToMany(targetEntity=BuyingOrder::class, mappedBy="id_user")
     */
    private $buyingOrders;

    /**
     * @ORM\OneToMany(targetEntity=Bid::class, mappedBy="id_user")
     */
    private $bids;

    /**
     * @ORM\OneToMany(targetEntity=Appointement::class, mappedBy="id_user_auctioneer")
     */
    private $appointements;

    public function __construct()
    {
        $this->sets = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->buyingOrders = new ArrayCollection();
        $this->bids = new ArrayCollection();
        $this->appointements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

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

    public function getLicence(): ?int
    {
        return $this->licence;
    }

    public function setLicence(?int $licence): self
    {
        $this->licence = $licence;

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
            $set->setIdUserAuctioneer($this);
        }

        return $this;
    }

    public function removeSet(Sets $set): self
    {
        if ($this->sets->removeElement($set)) {
            // set the owning side to null (unless already changed)
            if ($set->getIdUserAuctioneer() === $this) {
                $set->setIdUserAuctioneer(null);
            }
        }

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
            $product->setIdUser($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getIdUser() === $this) {
                $product->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|BuyingOrder[]
     */
    public function getBuyingOrders(): Collection
    {
        return $this->buyingOrders;
    }

    public function addBuyingOrder(BuyingOrder $buyingOrder): self
    {
        if (!$this->buyingOrders->contains($buyingOrder)) {
            $this->buyingOrders[] = $buyingOrder;
            $buyingOrder->setIdUser($this);
        }

        return $this;
    }

    public function removeBuyingOrder(BuyingOrder $buyingOrder): self
    {
        if ($this->buyingOrders->removeElement($buyingOrder)) {
            // set the owning side to null (unless already changed)
            if ($buyingOrder->getIdUser() === $this) {
                $buyingOrder->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Bid[]
     */
    public function getBids(): Collection
    {
        return $this->bids;
    }

    public function addBid(Bid $bid): self
    {
        if (!$this->bids->contains($bid)) {
            $this->bids[] = $bid;
            $bid->setIdUser($this);
        }

        return $this;
    }

    public function removeBid(Bid $bid): self
    {
        if ($this->bids->removeElement($bid)) {
            // set the owning side to null (unless already changed)
            if ($bid->getIdUser() === $this) {
                $bid->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Appointement[]
     */
    public function getAppointements(): Collection
    {
        return $this->appointements;
    }

    public function addAppointement(Appointement $appointement): self
    {
        if (!$this->appointements->contains($appointement)) {
            $this->appointements[] = $appointement;
            $appointement->setIdUserAuctioneer($this);
        }

        return $this;
    }

    public function removeAppointement(Appointement $appointement): self
    {
        if ($this->appointements->removeElement($appointement)) {
            // set the owning side to null (unless already changed)
            if ($appointement->getIdUserAuctioneer() === $this) {
                $appointement->setIdUserAuctioneer(null);
            }
        }

        return $this;
    }
}
