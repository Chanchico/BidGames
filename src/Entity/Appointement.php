<?php

namespace App\Entity;

use App\Repository\AppointementRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Symfony\Component\Validator\Constraints as Assert;
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="appointements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user_auctioneer;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="appointements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user_seller;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdUserAuctioneer(): ?User
    {
        return $this->id_user_auctioneer;
    }

    public function setIdUserAuctioneer(?User $id_user_auctioneer): self
    {
        $this->id_user_auctioneer = $id_user_auctioneer;

        return $this;
    }

    public function getIdUserSeller(): ?User
    {
        return $this->id_user_seller;
    }

    public function setIdUserSeller(?User $id_user_seller): self
    {
        $this->id_user_seller = $id_user_seller;

        return $this;
    }
}
