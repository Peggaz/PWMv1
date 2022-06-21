<?php
/**
 * TransactionService tests.
 */

namespace App\Tests\Service;

use App\Entity\Category;
use App\Entity\Enum\UserRole;
use App\Entity\Operation;
use App\Entity\Payment;
use App\Entity\Tag;
use App\Entity\Transaction;
use App\Entity\User;
use App\Entity\Wallet;
use App\Repository\CategoryRepository;
use App\Repository\OperationRepository;
use App\Repository\PaymentRepository;
use App\Repository\TagRepository;
use App\Repository\TransactionRepository;
use App\Repository\UserRepository;
use App\Repository\WalletRepository;
use App\Service\TransactionService;
use DateTime;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class TransactionServiceTest.
 */
class TransactionServiceTest extends KernelTestCase
{
    /**
     * Transaction service.
     *
     * @var TransactionService|null
     */
    private ?TransactionService $transactionService;

    /**
     * Transaction repository.
     *
     * @var TransactionRepository|null
     */
    private ?TransactionRepository $transactionRepository;

    /**
     * Test save.
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testSave(): void
    {
        // given
        $expectedTransaction = new Transaction();
        $expectedTransaction->setName('Test Transaction');
        $expectedTransaction->setDate(DateTime::createFromFormat('Y-m-d', "2021-05-09"));
        $expectedTransaction->setUpdatedAt(new DateTime('now'));
        $expectedTransaction->setCreatedAt(new DateTime('now'));
        $expectedTransaction->setPayment($this->createPayment());
        $expectedTransaction->setCategory($this->createCategory());
        $expectedTransaction->setOperation($this->createOperation());
        $expectedTransaction->addTag($this->createTag());
        $expectedTransaction->setWallet($this->createWallet());
        $expectedTransaction->setAmount('1000');
        try {
            $expectedTransaction->setAuthor($user = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'user999@example.com'));
        } catch (OptimisticLockException|ORMException|NotFoundExceptionInterface|ContainerExceptionInterface $e) {
        }


        // when
        $this->transactionService->save($expectedTransaction);
        $resultTransaction = $this->transactionRepository->findOneById(
            $expectedTransaction->getId()
        );

        // then
        $this->assertEquals($expectedTransaction, $resultTransaction);
    }

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
     * Create Category.
     * @return Category
     */
    private function createCategory(): Category
    {
        $category = new Category();
        $category->setName('TCategory');
        $category->setUpdatedAt(new DateTime('now'));
        $category->setCreatedAt(new DateTime('now'));
        $categoryRepository = self::getContainer()->get(CategoryRepository::class);
        $categoryRepository->save($category);

        return $category;
    }

    /**
     * Create Payment.
     * @return Payment
     */
    private function createPayment(): Payment
    {
        $payment = new Payment();
        $payment->setName('TPayment');
        $paymentRepository = self::getContainer()->get(PaymentRepository::class);
        $paymentRepository->save($payment);

        return $payment;
    }

    /**
     * Create Operation.
     * @return Operation
     */
    private function createOperation(): Operation
    {
        $operation = new Operation();
        $operation->setName('TOperation');
        $operation->setUpdatedAt(new DateTime('now'));
        $operation->setCreatedAt(new DateTime('now'));
        $operationRepository = self::getContainer()->get(OperationRepository::class);
        $operationRepository->save($operation);

        return $operation;
    }

    /**
     * Create Tag.
     * @return Tag
     */
    private function createTag(): Tag
    {
        $tag = new Tag();
        $tag->setName('TTag');
        $tag->setUpdatedAt(new DateTime('now'));
        $tag->setCreatedAt(new DateTime('now'));
        $tagRepository = self::getContainer()->get(TagRepository::class);
        $tagRepository->save($tag);

        return $tag;
    }

    /**
     * Create Wallet.
     * @return Wallet
     */
    private function createWallet(string $user = 'userr@example.com'): Wallet
    {
        $wallet = new Wallet();
        $wallet->setName('TWallet');
        $wallet->setBalance('1000');
        $wallet->setUpdatedAt(new DateTime('now'));
        $wallet->setCreatedAt(new DateTime('now'));
        $wallet->setUser($this->createUser([UserRole::ROLE_USER->value], $user));
        $walletRepository = self::getContainer()->get(WalletRepository::class);
        $walletRepository->save($wallet);

        return $wallet;
    }

    /**
     * Test delete.
     * @covers \App\Service\Transaction::delete
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testDelete(): void
    {
        // given
        $expectedTransaction = new Transaction();
        $expectedTransaction->setName('Test Transaction');
        $expectedTransaction->setDate((DateTime::createFromFormat('Y-m-d', "2021-05-09")));
        $expectedTransaction->setAmount('1000');
        $expectedTransaction->setUpdatedAt(new DateTime('now'));
        $expectedTransaction->setCreatedAt(new DateTime('now'));
        $expectedTransaction->setCategory($this->createCategory());
        $expectedTransaction->setWallet($this->createWallet('user2@example.com'));
        $expectedTransaction->setOperation($this->createOperation());
        $expectedTransaction->setPayment($this->createPayment());
        $expectedTransaction->addTag($this->createTag());
        try {
            $expectedTransaction->setAuthor($this->createUser([UserRole::ROLE_USER->value], 'transactiondeleteuser2@example.com'));
        } catch (OptimisticLockException|NotFoundExceptionInterface|ORMException|ContainerExceptionInterface $e) {
        }


        $expectedId = $expectedTransaction->getId();
        $this->transactionService->save($expectedTransaction);
        self::assertNull($this->transactionRepository->findOneById($expectedId));
        // when

        $this->transactionService->delete($expectedTransaction);
        $result = $this->transactionRepository->findOneById($expectedId);

        // then
        $this->assertNull($result);
    }

    /**
     * Set up test.
     */
    protected function setUp(): void
    {
        self::bootKernel();
        $container = self::getContainer();
        $this->transactionRepository = $container->get(TransactionRepository::class);
        $this->transactionService = $container->get(TransactionService::class);
        $this->categoryRepository = $container->get(CategoryRepository::class);
        $this->paymentRepository = $container->get(PaymentRepository::class);
        $this->walletRepository = $container->get(WalletRepository::class);
        $this->operationRepository = $container->get(OperationRepository::class);
        $this->tagRepository = $container->get(TagRepository::class);
        $this->userRepository = $container->get(UserRepository::class);
    }
}
