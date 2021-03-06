<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use App\Entity\Payment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Payment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Payment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Payment[]    findAll()
 * @method Payment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @extends ServiceEntityRepository<Payment>
 */
class PaymentRepository extends ServiceEntityRepository
{
    /**
     * Items per page.
     *
     * Use constants to define configuration options that rarely change instead
     * of specifying them in app/config/config.yml.
     * See https://symfony.com/doc/current/best_practices.html#configuration
     *
     * @constant int
     */
    public const PAGINATOR_ITEMS_PER_PAGE = 10;

    /**
     * Constructor.
     *
     * @param ManagerRegistry $registry Manager registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Payment::class);
    }

    /**
     * Query all records.
     *
     * @return QueryBuilder Query builder
     */
    public function queryAll(): QueryBuilder
    {
        return $this->getOrCreateQueryBuilder()
            ->select('partial payment.{id, createdAt, updatedAt, name}')
            ->orderBy('payment.updatedAt', 'DESC');
    }

    /**
     * Query records like name.
     *
     * @param string $name name who we search
     *
     * @return QueryBuilder Query builder
     */
    public function queryLikeName(string $name): QueryBuilder
    {
        $qb = $this->getOrCreateQueryBuilder();

        return $qb
            ->select('partial payment.{id, createdAt, updatedAt, name}')
            ->where(
                $qb->expr()->like('payment.name', $qb->expr()->literal('%'.$name.'%'))
            )
            ->orderBy('payment.updatedAt', 'DESC');
    }

    /**
     * Delete entity.
     *
     * @param Payment $payment Payment entity
     */
    public function delete(Payment $payment): void
    {
        $this->_em->remove($payment);
        $this->_em->flush();
    }

    /**
     * Save entity.
     *
     * @param Payment $payment Payment entity
     */
    public function save(Payment $payment): void
    {
        $this->_em->persist($payment);
        $this->_em->flush();
    }

    /**
     * Get or create new query builder.
     *
     * @param QueryBuilder|null $queryBuilder Query builder
     *
     * @return QueryBuilder Query builder
     */
    private function getOrCreateQueryBuilder(?QueryBuilder $queryBuilder = null): QueryBuilder
    {
        return $queryBuilder ?? $this->createQueryBuilder('payment');
    }
}
