<?php
/**
 * Transaction entity.
 */

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Transaction.
 *
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 * @ORM\Table(name="transaction")
 */
class Transaction
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
    private int $id;

    /**
     * Name.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * Date.
     *
     * @Assert\DateTime
     *
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $date;

    /**
     * Amount.
     *
     * @var int
     *
     * @ORM\Column(type="integer")
     */
    private int $amount;


    /**
     * Category.
     *
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\Category",
     *     inversedBy="transactions",
     *     fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Category $category;

    /**
     * Wallet.
     *
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\Wallet",
     *     inversedBy="transactions",
     *     fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Wallet $wallet;

    /**
     * Category.
     *
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\Category",
     *     inversedBy="transactions",
     *     fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Payment $payment;

    /**
     * Operation.
     *
     * @ORM\ManyToOne(
     *     targetEntity="App\Entity\Operation",
     *     inversedBy="transactions",
     *     fetch="EXTRA_LAZY")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?Operation $operation;

    /**
     * Tags.
     *
     * @var array|Collection
     *
     * @ORM\ManyToMany(
     *     targetEntity="App\Entity\Tag",
     *     inversedBy="transactions",
     *     fetch="EXTRA_LAZY",
     *
     * )
     * @ORM\JoinTable(name="transactions_tags")
     *
     *  @Assert\Type(type="Doctrine\Common\Collections\Collection")
     */
    private array|Collection $tags;

    /**
     * Author.
     *
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private User $author;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $comment;

    /**
     * Created at.
     *
     * @var DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     *
     * @Assert\Type(type="\DateTimeInterface")
     *
     */
    private DateTimeInterface $createdAt;

    /**
     * Updated at.
     *
     * @var DateTimeInterface
     *
     * @ORM\Column(type="datetime")
     *
     * @Assert\Type(type="\DateTimeInterface")
     *
     */
    private DateTimeInterface $updatedAt;

    /**
     * Transaction constructor.
     */
    #[Pure] public function __construct()
    {
        $this->tags = new ArrayCollection();
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
#region name
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
     * @return Transaction
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
#endregion
#region data
    /**
     * Getter for Date.
     *
     * @return DateTimeInterface Name
     */
    public function getDate(): DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Setter for Date.
     *
     * @param DateTimeInterface $date Date
     *
     * @return Transaction
     */
    public function setDate(DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
#endregion
#region amount
    /**
     * Setter for Amount.
     *
     * @param int $amount Amount
     *
     * @return Transaction
     */
    public function setAmount(int $amount): self
    {
        $this->amount = $amount;

        return $this;
    }
#endregion
#region create update
    /**
     * Getter for Created At.
     *
     * @return DateTimeInterface|null Created at
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Setter for Created at.
     *
     * @param DateTimeInterface $createdAt Created at
     *
     * @return Transaction
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Getter for Updated at.
     *
     * @return DateTimeInterface|null Updated at
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Setter for Updated at.
     *
     * @param DateTimeInterface $updatedAt Updated at
     *
     * @return Transaction
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Getter for category.
     *
     * @return Category|null Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }
#endregion
#region ManyToOne
    /**
     * Setter for category.
     *
     * @param Category|null $category Category
     *
     * @return Transaction
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Getter for wallet.
     *
     * @return Wallet|null Wallet
     */
    public function getWallet(): ?Wallet
    {
        return $this->wallet;
    }

    /**
     * Setter for wallet.
     *
     * @param Wallet|null $wallet Wallet
     *
     * @return Transaction
     */
    public function setWallet(?Wallet $wallet): self
    {
        $this->wallet = $wallet;

        return $this;
    }

    /**
     * Setter for payment.
     *
     * @param Payment|null $payment Payment
     *
     * @return Transaction
     */
    public function setPayment(?Payment $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    /**
     * Getter for operation.
     *
     * @return Operation|null Operation
     */
    public function getOperation(): ?Operation
    {
        return $this->operation;
    }

    /**
     * Setter for operation.
     *
     * @param Operation|null $operation Operation
     *
     * @return Transaction
     */
    public function setOperation(?Operation $operation): self
    {
        $this->operation = $operation;

        return $this;
    }

    /**
     * Getter for tags.
     *
     * @return Collection Tag collection
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * Add tag to collection.
     *
     * @param Tag $tag Tag entity
     */
    public function addTag(Tag $tag): void
    {
        if (!$this->tags->contains($tag)) {
            $this->tags[] = $tag;
        }
    }
#endregion
    /**
     * Remove tag from collection.
     *
     * @param Tag $tag Tag entity
     */
    public function removeTag(Tag $tag): void
    {
        if ($this->tags->contains($tag)) {
            $this->tags->removeElement($tag);
        }
    }

    /**
     * Getter for Author.
     *
     * @return User|null
     */
    public function getAuthor(): ?User
    {
        return $this->author;
    }

    /**
     * Setter foe Author.
     *
     * @param  User|null $author
     *
     * @return $this
     */
    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Getter for Comment.
     *
     * @return string|null
     */
    public function getComment(): ?string
    {
        return $this->comment;
    }

    /**
     * Setter for Comment.
     *
     * @param string|null $comment
     *
     * @return $this
     */
    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
