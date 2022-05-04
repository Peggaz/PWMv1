<?php
/**
 * Tag entity.
 */

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Tag.
 *
 * @ORM\Entity(repositoryClass="App\Repository\TagRepository")
 * @ORM\Table(name="tag")
 *
 * @UniqueEntity(fields={"name"})
 */
class Tag
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
     * @Assert\Type(type="string")
     * @Assert\NotBlank
     * @Assert\Length(
     *     min="3",
     *     max="64",
     * )
     */
    private $name;


    /**
     * Transactions.
     *
     * @var Collection|Transaction[] Transactions
     *
     * @ORM\ManyToMany(targetEntity="App\Entity\Transaction", mappedBy="tags")
     */
    private $transactions;

    /**
     * Tag constructor.
     */
    public function __construct()
    {
        $this->transactions = new ArrayCollection();
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
     * @return Tag
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }


    /**
     * Getter for transactions.
     *
     * @return \Doctrine\Common\Collections\Collection|Transaction[] Transactions collection
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    /**
     * Add transaction to collection.
     *
     * @param Transaction $transaction Transaction entity
     *
     * @return Tag
     */
    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->addTag($this);
        }

        return $this;
    }

    /**
     * Remove transaction from collection.
     *
     * @param Transaction $transaction Transaction entity
     *
     * @return Tag
     */
    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->removeElement($transaction)) {
            $transaction->removeTag($this);
        }

        return $this;
    }
}
