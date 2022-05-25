<?php
/**
 * Transaction service interface.
 */

namespace App\Service;

use App\Entity\Transaction;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * Interface TransactionServiceInterface.
 */
interface TransactionServiceInterface
{
    /**
     * Get paginated list.
     *
     * @param int $page Page number
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page): PaginationInterface;

    /**
     * Save entity.
     *
     * @param Transaction $transaction Transaction entity
     */
    public function save(Transaction $transaction): void;

    /**
     * Delete entity.
     *
     * @param Transaction $transaction Transaction entity
     */
    public function delete(Transaction $transaction): void;
}