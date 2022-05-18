<?php

namespace App\Entity;

use App\Repository\CommandDetailsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandDetailsRepository::class)]
class CommandDetails
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\ManyToOne(targetEntity: Product::class, inversedBy: 'commandDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $product;

    #[ORM\ManyToOne(targetEntity: Command::class, inversedBy: 'commandDetails')]
    #[ORM\JoinColumn(nullable: false)]
    private $command;

    #[ORM\Column(type: 'decimal', precision: 6, scale: 2)]
    private $unitPrice;

    #[ORM\Column(type: 'integer')]
    private $quantity;

    #[ORM\Column(type: 'date')]
    private $estimatedDate;

    #[ORM\Column(type: 'string', length: 15)]
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(?Command $command): self
    {
        $this->command = $command;

        return $this;
    }

    public function getUnitPrice(): ?string
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(string $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getEstimatedDate(): ?\DateTimeInterface
    {
        return $this->estimatedDate;
    }

    public function setEstimatedDate(\DateTimeInterface $estimatedDate): self
    {
        $this->estimatedDate = $estimatedDate;

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
}
