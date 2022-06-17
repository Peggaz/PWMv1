<?php
/**
 * TagService tests.
 */

namespace App\Tests\Service;

use App\Entity\Tag;
use App\Repository\TagRepository;
use App\Repository\TransactionRepository;
use App\Service\TagService;
use DateTime;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Class TagServiceTest.
 */
class TagServicesTest extends KernelTestCase
{
    /**
     * Tag service.
     *
     * @var TagService|object|null
     */
    private ?TagService $tagService;

    /**
     * Tag repository.
     *
     * @var TagRepository|object|null
     */
    private ?TagRepository $tagRepository;

    /**
     * Transaction repository.
     *
     * @var TransactionRepository|object|null
     */
    private ?TransactionRepository $transactionRepository;

    /**
     * Test save.
     *
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testSave(): void
    {
        // given
        $expectedTag = new Tag();
        $expectedTag->setName('Test Tag');
        $expectedTag->setCreatedAt(new \DateTime('now'));
        $expectedTag->setUpdatedAt(new \DateTime('now'));
        // when
        $this->tagService->save($expectedTag);
        $resultTag = $this->tagRepository->findOneById(
            $expectedTag->getId()
        );

        // then
        $this->assertEquals($expectedTag, $resultTag);
    }

    /**
     * Test delete.
     * @covers \App\Service\TagService
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testDelete(): void
    {
        // given
        $expectedTag = new Tag();
        $expectedTag->setName('Test Tag');
        $expectedTag->setCreatedAt(new DateTime('now'));
        $expectedTag->setUpdatedAt(new DateTime('now'));
        $this->tagRepository->save($expectedTag);
        $expectedId = $expectedTag->getId();
        $result = $this->tagRepository->findOneById($expectedId);
        $this->assertNotNull($result);
        // when
        $this->tagService->delete($expectedTag);
        $result = $this->tagRepository->findOneById($expectedId);

        // then
        $this->assertNull($result);
    }

    /**
     * Test find by id.
     *
     */
    public function testFindOneById(): void
    {
        // given
        $expectedTag = new Tag();
        $expectedTag->setName('Test Tag');
        $expectedTag->setCreatedAt(new \DateTime('now'));
        $expectedTag->setUpdatedAt(new \DateTime('now'));
        $this->tagRepository->save($expectedTag);

        // when
        $result = $this->tagService->findOneById($expectedTag->getId());

        // then
        $this->assertEquals($expectedTag->getId(), $result->getId());
    }

    /**
     * Test pagination empty list.
     */
    public function testCreatePaginatedListEmptyList(): void
    {
        // given
        $page = 1;
        $expectedResultSize = 0;
        // when
        $result = $this->tagService->getPaginatedList($page);

        // then
        $this->assertEquals($expectedResultSize, $result->count());
    }

    /**
     * Set up test.
     */
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::$container;
        $this->tagRepository = $container->get(TagRepository::class);
        $this->tagService = $container->get(TagService::class);
        $this->transactionRepository = $container->get(TransactionRepository::class);
    }
}
