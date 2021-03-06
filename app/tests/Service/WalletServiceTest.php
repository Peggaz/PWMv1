<?php
/**
 * WalletService tests.
 */

namespace App\Tests\Service;

use App\Entity\Enum\UserRole;
use App\Entity\User;
use App\Entity\Wallet;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Repository\WalletRepository;
use App\Service\WalletService;
use DateTime;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class WalletServiceTest.
 */
class WalletServiceTest extends KernelTestCase
{
    /**
     * Wallet service.
     *
     * @var WalletService|null
     */
    private ?WalletService $walletService;

    /**
     * Wallet repository.
     *
     * @var WalletRepository|null
     */
    private ?WalletRepository $walletRepository;

    /**
     * Create user.
     *
     * @param array $roles User roles
     *
     * @return User User entity
     *
     * @throws ContainerExceptionInterface|NotFoundExceptionInterface|ORMException|OptimisticLockException
     */
    protected function createUser(array $roles, string $email): User
    {
        $passwordHasher = static::getContainer()->get('security.password_hasher');
        $user = new User();
        $user->setEmail($email);
        $user->setUpdatedAt(new DateTime('now'));
        $user->setCreatedAt(new DateTime('now'));
        $user->setRoles($roles);
        $user->setPassword(
            $passwordHasher->hashPassword(
                $user,
                'p@55w0rd'
            )
        );
        $userRepository = static::getContainer()->get(UserRepository::class);
        $userRepository->save($user);

        return $user;
    }

    /**
     * Test save.
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testSave(): void
    {
        // given
        $expectedWallet = new Wallet();
        $expectedWallet->setName('Test Wallet');
        $expectedWallet->setUser($this->createUser([UserRole::ROLE_USER->value], 'user113@example.com'));
        $expectedWallet->setBalance('100');

        // when
        $this->walletService->save($expectedWallet);
        $resultWallet = $this->walletRepository->findOneById(
            $expectedWallet->getId()
        );

        // then
        $this->assertEquals($expectedWallet, $resultWallet);
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
        $expectedWallet = new Wallet();
        $expectedWallet->setName('Test Wallet');
        $expectedWallet->setBalance('100');
        $expectedWallet->setUpdatedAt(new DateTime('now'));
        $expectedWallet->setCreatedAt(new DateTime('now'));
        try {
            $expectedWallet->setUser($this->createUser([UserRole::ROLE_USER->value], 'userserdelete112@example.com'));
        } catch (OptimisticLockException|ORMException|ContainerExceptionInterface $e) {
        }
        $this->walletRepository->save($expectedWallet);
        $expectedId = $expectedWallet->getId();

        // when
        $this->walletService->delete($expectedWallet);
        $result = $this->walletRepository->findOneById($expectedId);

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
        $dataSetSize = 0;
        $expectedResultSize = 0;
        try {
            $user = $this->createUser([UserRole::ROLE_USER->value], 'WalletService1@example.com');
        } catch (OptimisticLockException|ORMException|ContainerExceptionInterface $e) {
        }
        $counter = 0;
        while ($counter < $dataSetSize) {
            $wallet = new Wallet();
            $wallet->setName('Test Wallet #' . $counter);
            $wallet->setBalance('100');
            $this->walletRepository->save($wallet);

            ++$counter;
        }

        // when
        $result = $this->walletService->getPaginatedList($page, $user);

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
        $this->walletRepository = $container->get(WalletRepository::class);
        $this->walletService = $container->get(WalletService::class);
        $this->transactionRepository = $container->get(TransactionRepository::class);
    }
}
