<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 8, unique: true)]
    private $reference;

    #[ORM\Column(type: 'string', length: 30)]
    private $name;

    #[ORM\Column(type: 'string', length: 150)]
    private $label;

    #[ORM\Column(type: 'text')]
    private $description;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2)]
    private $price;

    #[ORM\Column(type: 'integer')]
    private $stock;

    #[ORM\Column(type: 'boolean')]
    private $status;

    #[ORM\Column(type: 'string', length: 4)]
    private $picture;

    #[ORM\ManyToOne(targetEntity: Supplier::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private $supplier;

    #[ORM\ManyToOne(targetEntity: SubCategory::class, inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private $subCategory;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: OrderDetails::class)]
    private $orderDetails;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: DeliveryDetails::class)]
    private $deliveryDetails;

    public function __construct()
    {
        $this->orderDetails = new ArrayCollection();
        $this->deliveryDetails = new ArrayCollection();
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

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getSubCategory(): ?SubCategory
    {
        return $this->subCategory;
    }

    public function setSubCategory(?SubCategory $subCategory): self
    {
        $this->subCategory = $subCategory;

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
            $orderDetail->setProduct($this);
        }

        return $this;
    }

    public function removeOrderDetail(OrderDetails $orderDetail): self
    {
        if ($this->orderDetails->removeElement($orderDetail)) {
            // set the owning side to null (unless already changed)
            if ($orderDetail->getProduct() === $this) {
                $orderDetail->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, DeliveryDetails>
     */
    public function getDeliveryDetails(): Collection
    {
        return $this->deliveryDetails;
    }

    public function addDeliveryDetail(DeliveryDetails $deliveryDetail): self
    {
        if (!$this->deliveryDetails->contains($deliveryDetail)) {
            $this->deliveryDetails[] = $deliveryDetail;
            $deliveryDetail->setProduct($this);
        }

        return $this;
    }

    public function removeDeliveryDetail(DeliveryDetails $deliveryDetail): self
    {
        if ($this->deliveryDetails->removeElement($deliveryDetail)) {
            // set the owning side to null (unless already changed)
            if ($deliveryDetail->getProduct() === $this) {
                $deliveryDetail->setProduct(null);
            }
        }

        return $this;
    }
}
