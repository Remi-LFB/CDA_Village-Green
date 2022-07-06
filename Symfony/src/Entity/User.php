<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: 'mail', message: 'L\'email que vous avez saisit est déjà utilisé.')]
class User implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 6, unique: true)]
    private $reference;

    #[ORM\Column(type: 'string', length: 50)]
    private $lastname;

    #[ORM\Column(type: 'string', length: 50)]
    private $firstname;

    #[ORM\Column(type: 'date')]
    private $birthAt;

    #[ORM\Column(type: 'string', length: 5)]
    private $gender;

    #[ORM\Column(type: 'string', length: 15)]
    private $type;

    #[ORM\Column(type: 'decimal', precision: 2, scale: 1)]
    private $coefficient;

    #[ORM\Column(type: 'string', length: 15)]
    private $role;

    #[ORM\Column(type: 'string', length: 255, unique: true)]
    private $mail;

    #[ORM\Column(type: 'string', length: 60)]
    #[Assert\Length(min: "8", minMessage: 'Votre mdp doit faire 8 caractères.')]
    private $password;

    #[Assert\EqualTo(propertyPath: 'password', message: 'Vos mots de passe doivent être identique.')]
    public $confirmPassword;

    #[ORM\Column(type: 'string', length: 10)]
    private $phone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $address;

    #[ORM\Column(type: 'string', length: 5, nullable: true)]
    private $zipcode;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $city;

    #[ORM\Column(type: 'string', length: 50, nullable: true)]
    private $country;

    #[ORM\Column(type: 'datetime')]
    private $createdAt;

    #[ORM\Column(type: 'datetime')]
    private $lastSeenAt;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'commercials')]
    private $commercial;

    #[ORM\OneToMany(mappedBy: 'commercial', targetEntity: self::class)]
    private $commercials;

    #[ORM\OneToMany(mappedBy: 'user', targetEntity: Command::class)]
    private $commands;

    public function __construct()
    {
        $this->commercials = new ArrayCollection();
        $this->commands = new ArrayCollection();
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

    public function getBirthAt(): ?\DateTimeInterface
    {
        return $this->birthAt;
    }

    public function setBirthAt(\DateTimeInterface $birthAt): self
    {
        $this->birthAt = $birthAt;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

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

    public function getCoefficient(): ?string
    {
        return $this->coefficient;
    }

    public function setCoefficient(string $coefficient): self
    {
        $this->coefficient = $coefficient;

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

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getZipcode(): ?string
    {
        return $this->zipcode;
    }

    public function setZipcode(?string $zipcode): self
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
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

    public function getLastSeenAt(): ?\DateTimeInterface
    {
        return $this->lastSeenAt;
    }

    public function setLastSeenAt(\DateTimeInterface $lastSeenAt): self
    {
        $this->lastSeenAt = $lastSeenAt;

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
    public function getCommercials(): Collection
    {
        return $this->commercials;
    }

    public function addCommercial(self $commercial): self
    {
        if (!$this->commercials->contains($commercial)) {
            $this->commercials[] = $commercial;
            $commercial->setCommercial($this);
        }

        return $this;
    }

    public function removeCommercial(self $commercial): self
    {
        if ($this->commercials->removeElement($commercial)) {
            // set the owning side to null (unless already changed)
            if ($commercial->getCommercial() === $this) {
                $commercial->setCommercial(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Command>
     */
    public function getCommands(): Collection
    {
        return $this->commands;
    }

    public function addCommand(Command $command): self
    {
        if (!$this->commands->contains($command)) {
            $this->commands[] = $command;
            $command->setUser($this);
        }

        return $this;
    }

    public function removeCommand(Command $command): self
    {
        if ($this->commands->removeElement($command)) {
            // set the owning side to null (unless already changed)
            if ($command->getUser() === $this) {
                $command->setUser(null);
            }
        }

        return $this;
    }
}
