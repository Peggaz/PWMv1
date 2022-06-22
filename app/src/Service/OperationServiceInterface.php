<?php
/**
 * Task service interface.
 */

namespace App\Service;

use App\Entity\Operation;
use Knp\Component\Pager\Pagination\PaginationInterface;

/**
 * Interface OperationServiceInterface.
 */
interface OperationServiceInterface
{
    /**
     * Get paginated list.
     *
     * @param int $page Page number
     * @param string|null $name
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page, ?string $name): PaginationInterface;

    /**
     * Save entity.
     *
     * @param Operation $operation Operation entity
     */
    public function save(Operation $operation): void;

    /**
     * Can Operation be deleted?
     *
     * @param Operation $category Operation entity
     *
     * @return bool Result
     */
    public function canBeDeleted(Operation $category): bool;
}
