<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $date;

    #[ORM\Column(type: 'datetime')]
    private $payDate;

    #[ORM\Column(type: 'string', length: 50)]
    private $bilLastname;

    #[ORM\Column(type: 'string', length: 50)]
    private $bilFirstname;

    #[ORM\Column(type: 'string', length: 10)]
    private $bilPhone;

    #[ORM\Column(type: 'string', length: 255)]
    private $bilAddress;

    #[ORM\Column(type: 'string', length: 5)]
    private $bilZipcode;

    #[ORM\Column(type: 'string', length: 50)]
    private $bilCity;

    #[ORM\Column(type: 'string', length: 15)]
    private $bilCountry;

    #[ORM\Column(type: 'string', length: 50)]
    private $delLastname;

    #[ORM\Column(type: 'string', length: 50)]
    private $delFirstname;

    #[ORM\Column(type: 'string', length: 10)]
    private $delPhone;

    #[ORM\Column(type: 'string', length: 255)]
    private $delAddress;

    #[ORM\Column(type: 'string', length: 5)]
    private $delZipcode;

    #[ORM\Column(type: 'string', length: 50)]
    private $delCity;

    #[ORM\Column(type: 'string', length: 15)]
    private $delCountry;

    #[ORM\Column(type: 'string', length: 15)]
    private $status;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2, nullable: true)]
    private $discount;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\OneToMany(mappedBy: 'ord', targetEntity: OrderDetails::class)]
    private $orderDetails;

    #[ORM\OneToMany(mappedBy: 'ord', targetEntity: Delivery::class)]
    private $deliveries;

    public function __construct()
    {
        $this->orderDetails = new ArrayCollection();
        $this->deliveries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getPayDate(): ?\DateTimeInterface
    {
        return $this->payDate;
    }

    public function setPayDate(\DateTimeInterface $payDate): self
    {
        $this->payDate = $payDate;

        return $this;
    }

    public function getBilLastname(): ?string
    {
        return $this->bilLastname;
    }

    public function setBilLastname(string $bilLastname): self
    {
        $this->bilLastname = $bilLastname;

        return $this;
    }

    public function getBilFirstname(): ?string
    {
        return $this->bilFirstname;
    }

    public function setBilFirstname(string $bilFirstname): self
    {
        $this->bilFirstname = $bilFirstname;

        return $this;
    }

    public function getBilPhone(): ?string
    {
        return $this->bilPhone;
    }

    public function setBilPhone(string $bilPhone): self
    {
        $this->bilPhone = $bilPhone;

        return $this;
    }

    public function getBilAddress(): ?string
    {
        return $this->bilAddress;
    }

    public function setBilAddress(string $bilAddress): self
    {
        $this->bilAddress = $bilAddress;

        return $this;
    }

    public function getBilZipcode(): ?string
    {
        return $this->bilZipcode;
    }

    public function setBilZipcode(string $bilZipcode): self
    {
        $this->bilZipcode = $bilZipcode;

        return $this;
    }

    public function getBilCity(): ?string
    {
        return $this->bilCity;
    }

    public function setBilCity(string $bilCity): self
    {
        $this->bilCity = $bilCity;

        return $this;
    }

    public function getBilCountry(): ?string
    {
        return $this->bilCountry;
    }

    public function setBilCountry(string $bilCountry): self
    {
        $this->bilCountry = $bilCountry;

        return $this;
    }

    public function getDelLastname(): ?string
    {
        return $this->delLastname;
    }

    public function setDelLastname(string $delLastname): self
    {
        $this->delLastname = $delLastname;

        return $this;
    }

    public function getDelFirstname(): ?string
    {
        return $this->delFirstname;
    }

    public function setDelFirstname(string $delFirstname): self
    {
        $this->delFirstname = $delFirstname;

        return $this;
    }

    public function getDelPhone(): ?string
    {
        return $this->delPhone;
    }

    public function setDelPhone(string $delPhone): self
    {
        $this->delPhone = $delPhone;

        return $this;
    }

    public function getDelAddress(): ?string
    {
        return $this->delAddress;
    }

    public function setDelAddress(string $delAddress): self
    {
        $this->delAddress = $delAddress;

        return $this;
    }

    public function getDelZipcode(): ?string
    {
        return $this->delZipcode;
    }

    public function setDelZipcode(string $delZipcode): self
    {
        $this->delZipcode = $delZipcode;

        return $this;
    }

    public function getDelCity(): ?string
    {
        return $this->delCity;
    }

    public function setDelCity(string $delCity): self
    {
        $this->delCity = $delCity;

        return $this;
    }

    public function getDelCountry(): ?string
    {
        return $this->delCountry;
    }

    public function setDelCountry(string $delCountry): self
    {
        $this->delCountry = $delCountry;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getDiscount(): ?string
    {
        return $this->discount;
    }

    public function setDiscount(?string $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection<int, OrderDetails>
     */
    public function getOrderDetails(): Collection
    {
        return $this->orderDetails;
    }

    public function addOrderDetail(OrderDetails $orderDetail): self
    {
        if (!$this->orderDetails->contains($orderDetail)) {
            $this->orderDetails[] = $orderDetail;
            $orderDetail->setOrd($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): self
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getOrd() === $this) {
                $orderDetail->setOrd(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Delivery>
     */
    public function getDeliveries(): Collection
    {
        return $this->deliveries;
    }

    public function addDelivery(Delivery $delivery): self
    {
        if (!$this->deliveries->contains($delivery)) {
            $this->deliveries[] = $delivery;
            $delivery->setOrd($this);
        }

        return $this;
    }

    public function removeDelivery(Delivery $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getOrd() === $this) {
                $delivery->setOrd(null);
            }
        }

        return $this;
    }
}
