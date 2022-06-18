<?php
/**
 * Payment service.
 */

namespace App\Service;

use App\Entity\Payment;
use App\Repository\CategoryRepository;
use App\Repository\PaymentRepository;
use DateTimeImmutable;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Knp\Component\Pager\PaginatorInterface;
use phpDocumentor\Reflection\Types\Nullable;

/**
 * Class PaymentService.
 */
class PaymentService implements PaymentServiceInterface
{
    /**
     * Payment repository.
     */
    private PaymentRepository $paymentRepository;

    /**
     * Paginator.
     */
    private PaginatorInterface $paginator;

    /**
     * Constructor.
     *
     * @param PaymentRepository $paymentRepository Payment repository
     * @param PaginatorInterface $paginator Paginator
     */
    public function __construct(PaymentRepository $paymentRepository, PaginatorInterface $paginator)
    {
        $this->paymentRepository = $paymentRepository;
        $this->paginator = $paginator;
    }

    /**
     * Get paginated list.
     *
     * @param int $page Page number
     * @param string|null $name
     *
     * @return PaginationInterface<string, mixed> Paginated list
     */
    public function getPaginatedList(int $page, string $name = Nullable::class): PaginationInterface
    {
        if ($name == Nullable::class) {
            return $this->paginator->paginate(
                $this->paymentRepository->queryAll(),
                $page,
                CategoryRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        } else {
            return $this->paginator->paginate(
                $this->paymentRepository->queryLikeName($name),
                $page,
                CategoryRepository::PAGINATOR_ITEMS_PER_PAGE
            );
        }
    }

    /**
     * Save entity.
     *
     * @param Payment $payment Payment entity
     */
    public function save(Payment $payment): void
    {
        if ($payment->getId() == null) {
            $payment->setCreatedAt(new DateTimeImmutable());
        }
        $payment->setUpdatedAt(new DateTimeImmutable());

        $this->paymentRepository->save($payment);
    }

    /**
     * Delete category.
     *
     * @param Payment $payment Payment entity
     *
     */
    public function delete(Payment $payment): void
    {
        $this->paymentRepository->delete($payment);
    }
}
