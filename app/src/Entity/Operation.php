<?php
/**
 * Operation entity.
 */

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use JetBrains\PhpStorm\Pure;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class Operation.
 *
 * @ORM\Entity(repositoryClass="App\Repository\OperationRepository")
 *
 * @ORM\Table(name="operation")
 *
 * @UniqueEntity(fields={"name"})
 */
class Operation
{
    /**
     * Primary key.
     *
     * var int
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
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * Transaction.
     *
     * @var Collection|Transaction[] Transaction
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity=Transaction::class, mappedBy="operation")
     */
    private Collection $transactions;


    /**
     * Operation constructor.
     */
    #[Pure] public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    /**
     * Getter for Id.
     *
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Getter for Name.
     *
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Setter for Name.
     *
     * @param string $name
     *
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Getter for Transactions.
     *
     * @return Collection
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    /**
     * Add for Transactions.
     *
     * @param Transaction $transaction Transaction Entity
     *
     * @return $this
     */
    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setOperation($this);
        }

        return $this;
    }

    /**
     * Remove for Transactions.
     *
     * @param Transaction $transaction
     *
     * @return $this
     */
    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            if ($transaction->getOperation() === $this) {
                $transaction->setOperation(null);
            }
        }

        return $this;
    }

    /**
     * Getter for Create At.
     *
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * Setter for Create At.
     *
     * @param DateTimeInterface $createdAt
     *
     * @return $this
     */
    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Getter for Update At.
     *
     * @return DateTimeInterface|null
     */
    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * Setter for Update At.
     *
     * @param DateTimeInterface $updatedAt
     *
     * @return $this
     */
    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
