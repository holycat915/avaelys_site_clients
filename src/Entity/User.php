<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 30)]
    private ?string $name = null;

    #[ORM\Column(length: 30)]
    private ?string $firstname = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $job = null;

    #[ORM\ManyToMany(targetEntity: DomainName::class, inversedBy: 'users')]
    private Collection $domainNames;

    public function __construct()
    {
        $this->domainNames = new ArrayCollection();
    }

//    #[ORM\ManyToMany(targetEntity: DomainName::class, inversedBy: 'users')]
//    private Collection $domainNames;
//
//    public function __construct()
//    {
//        $this->domainNames = new ArrayCollection();
//    }



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
//        $roles = $this->roles;
//        // guarantee every user at least has ROLE_USER
//        $roles[] = 'ROLE_USER';
//
//        return array_unique($roles);


        return $this->roles;
    }
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function setJob(?string $job): self
    {
        $this->job = $job;

        return $this;
    }
//
//    /**
//     * @return Collection<int, DomainName>
//     */
//    public function getDomainName(): Collection
//    {
//        return $this->domainName;
//    }
//
//    public function addDomainName(DomainName $domainName): self
//    {
//        if (!$this->domainNames->contains($domainName)) {
//            $this->domainNames->add($domainName);
//        }
//
//        return $this;
//    }
//
//    public function removeDomainName(DomainName $domainName): self
//    {
//        $this->domainNames->removeElement($domainName);
//
//        return $this;
//    }

/**
 * @return Collection<int, DomainName>
 */
public function getDomainNames(): Collection
{
    return $this->domainNames;
}

public function addDomainName(DomainName $domainName): self
{
    if (!$this->domainNames->contains($domainName)) {
        $this->domainNames->add($domainName);
    }

    return $this;
}

public function removeDomainName(DomainName $domainName): self
{
    $this->domainNames->removeElement($domainName);

    return $this;
}


}
