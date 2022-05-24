<?php

namespace App\Entity;

use App\Repository\CommandRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandRepository::class)]
class Command
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $payedAt;

    #[ORM\Column(type: 'string', length: 50)]
    private $paymentMethod;

    #[ORM\Column(type: 'string', length: 255)]
    private $billingAddress;

    #[ORM\Column(type: 'string', length: 5)]
    private $billingZipcode;

    #[ORM\Column(type: 'string', length: 50)]
    private $billingCity;

    #[ORM\Column(type: 'string', length: 50)]
    private $billingCountry;

    #[ORM\Column(type: 'string', length: 255)]
    private $deliveryAddress;

    #[ORM\Column(type: 'string', length: 5)]
    private $deliveryZipcode;

    #[ORM\Column(type: 'string', length: 50)]
    private $deliveryCity;

    #[ORM\Column(type: 'string', length: 50)]
    private $deliveryCountry;

    #[ORM\Column(type: 'string', length: 50)]
    private $state;

    #[ORM\Column(type: 'decimal', precision: 4, scale: 2, nullable: true)]
    private $discount;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'commands')]
    #[ORM\JoinColumn(nullable: false)]
    private $user;

    #[ORM\OneToMany(mappedBy: 'command', targetEntity: CommandDetails::class)]
    private $commandDetails;

    #[ORM\OneToOne(mappedBy: 'command', targetEntity: Invoice::class, cascade: ['persist', 'remove'])]
    private $invoice;

    #[ORM\OneToMany(mappedBy: 'command', targetEntity: Delivery::class)]
    private $deliveries;

    public function __construct()
    {
        $this->commandDetails = new ArrayCollection();
        $this->deliveries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getPayedAt(): ?\DateTimeInterface
    {
        return $this->payedAt;
    }

    public function setPayedAt(\DateTimeInterface $payedAt): self
    {
        $this->payedAt = $payedAt;

        return $this;
    }

    public function getPaymentMethod(): ?string
    {
        return $this->paymentMethod;
    }

    public function setPaymentMethod(string $paymentMethod): self
    {
        $this->paymentMethod = $paymentMethod;

        return $this;
    }

    public function getBillingAddress(): ?string
    {
        return $this->billingAddress;
    }

    public function setBillingAddress(string $billingAddress): self
    {
        $this->billingAddress = $billingAddress;

        return $this;
    }

    public function getBillingZipcode(): ?string
    {
        return $this->billingZipcode;
    }

    public function setBillingZipcode(string $billingZipcode): self
    {
        $this->billingZipcode = $billingZipcode;

        return $this;
    }

    public function getBillingCity(): ?string
    {
        return $this->billingCity;
    }

    public function setBillingCity(string $billingCity): self
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    public function getBillingCountry(): ?string
    {
        return $this->billingCountry;
    }

    public function setBillingCountry(string $billingCountry): self
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    public function getDeliveryAddress(): ?string
    {
        return $this->deliveryAddress;
    }

    public function setDeliveryAddress(string $deliveryAddress): self
    {
        $this->deliveryAddress = $deliveryAddress;

        return $this;
    }

    public function getDeliveryZipcode(): ?string
    {
        return $this->deliveryZipcode;
    }

    public function setDeliveryZipcode(string $deliveryZipcode): self
    {
        $this->deliveryZipcode = $deliveryZipcode;

        return $this;
    }

    public function getDeliveryCity(): ?string
    {
        return $this->deliveryCity;
    }

    public function setDeliveryCity(string $deliveryCity): self
    {
        $this->deliveryCity = $deliveryCity;

        return $this;
    }

    public function getDeliveryCountry(): ?string
    {
        return $this->deliveryCountry;
    }

    public function setDeliveryCountry(string $deliveryCountry): self
    {
        $this->deliveryCountry = $deliveryCountry;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

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
     * @return Collection<int, CommandDetails>
     */
    public function getCommandDetails(): Collection
    {
        return $this->commandDetails;
    }

    public function addCommandDetail(CommandDetails $commandDetail): self
    {
        if (!$this->commandDetails->contains($commandDetail)) {
            $this->commandDetails[] = $commandDetail;
            $commandDetail->setCommand($this);
        }

        return $this;
    }

    public function removeCommandDetail(CommandDetails $commandDetail): self
    {
        if ($this->commandDetails->removeElement($commandDetail)) {
            // set the owning side to null (unless already changed)
            if ($commandDetail->getCommand() === $this) {
                $commandDetail->setCommand(null);
            }
        }

        return $this;
    }

    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    public function setInvoice(Invoice $invoice): self
    {
        // set the owning side of the relation if necessary
        if ($invoice->getCommand() !== $this) {
            $invoice->setCommand($this);
        }

        $this->invoice = $invoice;

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
            $delivery->setCommand($this);
        }

        return $this;
    }

    public function removeDelivery(Delivery $delivery): self
    {
        if ($this->deliveries->removeElement($delivery)) {
            // set the owning side to null (unless already changed)
            if ($delivery->getCommand() === $this) {
                $delivery->setCommand(null);
            }
        }

        return $this;
    }
}
