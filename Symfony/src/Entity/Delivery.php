<?php

namespace App\Entity;

use App\Repository\DeliveryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DeliveryRepository::class)]
class Delivery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\ManyToOne(targetEntity: Command::class, inversedBy: 'deliveries')]
    #[ORM\JoinColumn(nullable: false)]
    private $command;

    #[ORM\OneToMany(mappedBy: 'delivery', targetEntity: DeliveryDetails::class)]
    private $deliveryDetails;

    public function __construct()
    {
        $this->deliveryDetails = new ArrayCollection();
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

    public function getCommand(): ?Command
    {
        return $this->command;
    }

    public function setCommand(?Command $command): self
    {
        $this->command = $command;

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
            $deliveryDetail->setDelivery($this);
        }

        return $this;
    }

    public function removeDeliveryDetail(DeliveryDetails $deliveryDetail): self
    {
        if ($this->deliveryDetails->removeElement($deliveryDetail)) {
            // set the owning side to null (unless already changed)
            if ($deliveryDetail->getDelivery() === $this) {
                $deliveryDetail->setDelivery(null);
            }
        }

        return $this;
    }
}
