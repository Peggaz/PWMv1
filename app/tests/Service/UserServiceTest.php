<?php

namespace App\Tests\Service;

use App\Entity\User;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Service\UserService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserServiceTest extends KernelTestCase
{
    /**
     * User service.
     *
     * @var UserService|null
     */
    private ?UserService $userService;

    /**
     * User repository.
     *
     * @var UserRepository|null
     */
    private ?UserRepository $userRepository;

    /**
     * Set up test.
     */
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->userRepository = $container->get(UserRepository::class);
        $this->userService = $container->get(UserService::class);
        $this->transactionRepository = $container->get(TransactionRepository::class);
    }

    /**
     * Test pagination empty list.
     */
    public function testCreatePaginatedListEmptyList(): void
    {
        // given
        $page = 1;
        $dataSetSize = 0;
        $expectedResultSize = 10;
        $counter = 0;
        while ($counter < $dataSetSize) {
            $passwordHarsher = static::getContainer()->get('security.password_hasher');
            $expectedUser = new User();
            $expectedUser->setEmail('userservicepag' . $counter . '@examle.com');
            $expectedUser->setPassword(
                $passwordHarsher->hashPassword(
                    $expectedUser,
                    'p@55w0rd'
                ));
            $this->userRepository->save($expectedUser);
            ++$counter;
        }

        // when
        $result = $this->userService->getPaginatedList($page);

        // then
        $this->assertEquals($expectedResultSize, $result->count());
    }

    public function testFindOneById()
    {
        //given
        $passwordHarsher = static::getContainer()->get('security.password_hasher');
        $expectedUser = new User();
        $expectedUser->setEmail('userservicefind@examle.com');
        $expectedUser->setPassword(
            $passwordHarsher->hashPassword(
                $expectedUser,
                'p@55w0rd'
            ));
        //when
        $this->userRepository->save($expectedUser);
        $expectedId = $expectedUser->getId();

        //then
        $this->assertNotNull($this->userRepository->findOneById($expectedId));

    }


    /**
     * Test delete.
     *
     */
    public function testDelete(): void
    {
        // given
        $passwordHarsher = static::getContainer()->get('security.password_hasher');
        $expectedUser = new User();
        $expectedUser->setEmail('userservicedelete@examle.com');
        $expectedUser->setPassword(
            $passwordHarsher->hashPassword(
                $expectedUser,
                'p@55w0rd'
            ));
        $this->userRepository->save($expectedUser);
        $expectedId = $expectedUser->getId();

        // when
        $this->userService->delete($expectedUser);
        $result = $this->userRepository->findOneById($expectedId);


        $this->userService->delete($expectedUser);
        $result = $this->userService->findOneById($expectedId);


        // then
        $this->assertNull($result);
    }

    /**
     * Test save.
     */
    public function testSave(): void
    {
        // given
        $passwordHarsher = static::getContainer()->get('security.password_hasher');
        $expectedUser = new User();
        $expectedUser->setEmail('userservicesave@examle.com');
        $expectedUser->setPassword(
            $passwordHarsher->hashPassword(
                $expectedUser,
                'p@55w0rd'
            ));

        // when
        $this->userService->save($expectedUser);
        $resultUser = $this->userRepository->findOneById(
            $expectedUser->getId()
        );

        // then
        $this->assertEquals($expectedUser, $resultUser);
    }
}
