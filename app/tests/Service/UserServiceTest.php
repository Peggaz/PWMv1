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

    public function testGetPaginatedList()
    {

    }

    public function test__construct()
    {

    }

    public function testDelete()
    {

    }

    public function testFindOneById()
    {

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
