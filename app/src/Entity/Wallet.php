<?php
/**
 * Wallet entity.
 */

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Wallet.
 *
 * @ORM\Entity(repositoryClass="App\Repository\WalletRepository")
 * @ORM\Table(name="wallet")
 *
 * @UniqueEntity(fields={"name"})
 */
class Wallet
{
    /**
     * Primary key.
     *
     * @var int
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * Name.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=64)
     */
    private string $name;

    /**
     * Balance.
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private int $balance;


    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="wallet")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?User $user;

    /**
     * Wallet constructor.
     */
    public function __construct()
    {
    }

    /**
     * Getter for Id.
     *
     * @return int|null Result
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for Name.
     *
     * @return string|null Name
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Setter for Name.
     *
     * @param string $name Name
     *
     * @return Wallet
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Getter for Balance.
     *
     * @return int|null
     */
    public function getBalance(): ?int
    {
        return $this->balance;
    }

    /**
     * Setter for Balance.
     *
     * @param int $balance Balance
     *
     * @return $this
     */
    public function setBalance(int $balance): self
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Getter for Created At.
     *
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Setter for Created At.
     *
     * @param DateTimeInterface $createdAt Created At
     *
     * @return $this
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Getter for Updated At.
     *
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Setter for Updated At.
     *
     * @param DateTimeInterface $updatedAt Updated At
     *
     * @return $this
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

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
}
