<?php
/**
 * Task service interface.
 */

namespace App\Service;

use App\Entity\Operation;
use Knp\Component\Pager\Pagination\PaginationInterface;
use phpDocumentor\Reflection\Types\Nullable;

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
    public function getPaginatedList(int $page, string $name = Nullable::class): PaginationInterface;

    /**
     * Save entity.
     *
     * @param Operation $operation Operation entity
     */
    public function save(Operation $operation): void;

}