<?php
/**
 * operationService tests.
 */

namespace App\Tests\Service;

use App\Entity\Operation;
use App\Repository\OperationRepository;
use App\Repository\TransactionRepository;
use App\Service\OperationService;
use DateTime;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class OperationServiceTest.
 */
class OperationServiceTest extends KernelTestCase
{
    /**
     * Operation service.
     *
     * @var OperationService|null
     */
    private ?OperationService $operationService;

    /**
     * Operation repository.
     *
     * @var OperationRepository|null
     */
    private ?OperationRepository $operationRepository;


    /**
     * Test save.
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testSave(): void
    {
        // given
        $expectedOperation = new Operation();
        $expectedOperation->setName('Test Operation');
        $expectedOperation->setCreatedAt(new DateTime('now'));
        $expectedOperation->setUpdatedAt(new DateTime('now'));

        // when
        $this->operationService->save($expectedOperation);
        $resultOperation = $this->operationRepository->findOneById(
            $expectedOperation->getId()
        );

        // then
        $this->assertEquals($expectedOperation, $resultOperation);
    }

    /**
     * Test delete.
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testDelete(): void
    {
        // given
        $expectedOperation = new Operation();
        $expectedOperation->setName('Test Operation');
        $expectedOperation->setCreatedAt(new DateTime('now'));
        $expectedOperation->setUpdatedAt(new DateTime('now'));
        $this->operationRepository->save($expectedOperation);
        $expectedId = $expectedOperation->getId();

        // when
        $this->operationService->delete($expectedOperation);
        $result = $this->operationRepository->findOneById($expectedId);

        // then
        $this->assertNull($result);
    }

    /**
     * Test pagination empty list.
     */
    public function testCreatePaginatedListEmptyList(): void
    {
        // given
        $page = 1;
        $expectedResultSize = $this->operationService->getPaginatedList($page)->count();

        // when
        $result = $this->operationService->getPaginatedList($page);

        // then
        $this->assertEquals($expectedResultSize, $result->count());
    }

    /**
     * Set up test.
     */
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->operationRepository = $container->get(OperationRepository::class);
        $this->operationService = $container->get(OperationService::class);
        $this->transactionRepository = $container->get(TransactionRepository::class);
    }
}