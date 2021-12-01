<?php

namespace App\Entity;

use App\Repository\VerifyRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VerifyRepository::class)
 */
class Verify
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
    private $id_verify;

    /**
     * @ORM\Column(type="boolean")
     */
    private $verified;

    /**
     * @ORM\OneToOne(targetEntity=users::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdVerify(): ?int
    {
        return $this->id_verify;
    }

    public function setIdVerify(int $id_verify): self
    {
        $this->id_verify = $id_verify;

        return $this;
    }

    public function getVerified(): ?bool
    {
        return $this->verified;
    }

    public function setVerified(bool $verified): self
    {
        $this->verified = $verified;

        return $this;
    }

    public function getIdUser(): ?users
    {
        return $this->id_user;
    }

    public function setIdUser(users $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }
}
