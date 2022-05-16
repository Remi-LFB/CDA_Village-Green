<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 8, unique: true)]
    private $reference;

    #[ORM\Column(type: 'string', length: 50)]
    private $lastname;

    #[ORM\Column(type: 'string', length: 50)]
    private $firstname;

    #[ORM\Column(type: 'string', length: 15)]
    private $type;

    #[ORM\Column(type: 'string', length: 15)]
    private $role;

    #[ORM\Column(type: 'decimal', precision: 2, scale: 1)]
    private $coefficient;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $mail;

    #[ORM\Column(type: 'string', length: 60)]
    private $password;

    #[ORM\Column(type: 'string', length: 10)]
    private $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $bilAddress;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    private $bilZipcode;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $bilCity;

    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    private $bilCountry;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $delAddress;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    private $delZipcode;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $delCity;

    #[ORM\Column(type: 'string', length: 15, nullable: true)]
    private $delCountry;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'users')]
    private $commercial;

    #[ORM\OneToMany(mappedBy: 'commercial', targetEntity: self::class)]
    private $users;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Order::class)]
    private $orders;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getCoefficient(): ?string
    {
        return $this->coefficient;
    }

    public function setCoefficient(string $coefficient): self
    {
        $this->coefficient = $coefficient;

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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getBilAddress(): ?string
    {
        return $this->bilAddress;
    }

    public function setBilAddress(?string $bilAddress): self
    {
        $this->bilAddress = $bilAddress;

        return $this;
    }

    public function getBilZipcode(): ?string
    {
        return $this->bilZipcode;
    }

    public function setBilZipcode(?string $bilZipcode): self
    {
        $this->bilZipcode = $bilZipcode;

        return $this;
    }

    public function getBilCity(): ?string
    {
        return $this->bilCity;
    }

    public function setBilCity(?string $bilCity): self
    {
        $this->bilCity = $bilCity;

        return $this;
    }

    public function getBilCountry(): ?string
    {
        return $this->bilCountry;
    }

    public function setBilCountry(?string $bilCountry): self
    {
        $this->bilCountry = $bilCountry;

        return $this;
    }

    public function getDelAddress(): ?string
    {
        return $this->delAddress;
    }

    public function setDelAddress(?string $delAddress): self
    {
        $this->delAddress = $delAddress;

        return $this;
    }

    public function getDelZipcode(): ?string
    {
        return $this->delZipcode;
    }

    public function setDelZipcode(?string $delZipcode): self
    {
        $this->delZipcode = $delZipcode;

        return $this;
    }

    public function getDelCity(): ?string
    {
        return $this->delCity;
    }

    public function setDelCity(?string $delCity): self
    {
        $this->delCity = $delCity;

        return $this;
    }

    public function getDelCountry(): ?string
    {
        return $this->delCountry;
    }

    public function setDelCountry(?string $delCountry): self
    {
        $this->delCountry = $delCountry;

        return $this;
    }

    public function getCommercial(): ?self
    {
        return $this->commercial;
    }

    public function setCommercial(?self $commercial): self
    {
        $this->commercial = $commercial;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(self $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setCommercial($this);
        }

        return $this;
    }

    public function removeUser(self $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCommercial() === $this) {
                $user->setCommercial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): self
    {
        if (!$this->orders->contains($order)) {
            $this->orders[] = $order;
            $order->setUser($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): self
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getUser() === $this) {
                $order->setUser(null);
            }
        }

        return $this;
    }
}
