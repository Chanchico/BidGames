<?php

namespace App\Entity;

use App\Repository\AppointementRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppointementRepository::class)
 */
class Appointement
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
    private $id_appointement;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_appointement;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $address;

    /**
     * @ORM\Column(type="decimal", precision=15, scale=2)
     */
    private $cost;

    /**
     * @ORM\OneToOne(targetEntity=users::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user_auctioneer;

    /**
     * @ORM\OneToOne(targetEntity=users::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user_seller;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAppointement(): ?int
    {
        return $this->id_appointement;
    }

    public function setIdAppointement(int $id_appointement): self
    {
        $this->id_appointement = $id_appointement;

        return $this;
    }

    public function getDateAppointement(): ?\DateTimeInterface
    {
        return $this->date_appointement;
    }

    public function setDateAppointement(\DateTimeInterface $date_appointement): self
    {
        $this->date_appointement = $date_appointement;

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

    public function getCost(): ?string
    {
        return $this->cost;
    }

    public function setCost(string $cost): self
    {
        $this->cost = $cost;

        return $this;
    }

    public function getIdUserAuctioneer(): ?users
    {
        return $this->id_user_auctioneer;
    }

    public function setIdUserAuctioneer(users $id_user_auctioneer): self
    {
        $this->id_user_auctioneer = $id_user_auctioneer;

        return $this;
    }

    public function getIdUserSeller(): ?users
    {
        return $this->id_user_seller;
    }

    public function setIdUserSeller(users $id_user_seller): self
    {
        $this->id_user_seller = $id_user_seller;

        return $this;
    }
}
