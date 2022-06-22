<?php
/**
 * Transaction Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Enum\UserRole;
use App\Entity\Transaction;
use App\Repository\TransactionRepository;
use App\Tests\WebBaseTestCase;
use DateTime;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class TransactionControllerTest.
 */
class TransactionControllerTest extends WebBaseTestCase
{
    /**
     * Test route.
     *
     * @const string
     */
    public const TEST_ROUTE = '/transaction';


    /**
     * Set up tests.
     */
    public function setUp(): void
    {
        $this->httpClient = static::createClient();
    }

    /**
     * @return void
     */
    public function testIndexRouteAnonymousUser(): void
    {
        // given
        $user = null;
        $expectedStatusCode = 200;
        try {
            $user = $this->createUser([UserRole::ROLE_ADMIN->value], 'transactionindexuser@example.com');
        } catch (OptimisticLockException|NotFoundExceptionInterface|ContainerExceptionInterface|ORMException $e) {
        }
        $this->logIn($user);
        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test index route for admin user.
     *
     * @throws ContainerExceptionInterface|NotFoundExceptionInterface|ORMException|OptimisticLockException
     */
    public function testIndexRouteAdminUser(): void
    {
        // given
        $expectedStatusCode = 200;
        $adminUser = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'transaction_user@example.com');
        $this->httpClient->loginUser($adminUser);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test index route for non-authorized user.
     *
     * @throws ContainerExceptionInterface|NotFoundExceptionInterface|ORMException|OptimisticLockException
     */
    public function testIndexRouteNonAuthorizedUser(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value], 'transaction_user2@example.com');
        $this->httpClient->loginUser($user);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals(200, $resultStatusCode);
    }


    /**
     * Test show single transaction.
     *
     * @throws ContainerExceptionInterface|NotFoundExceptionInterface|ORMException|OptimisticLockException
     */
    public function testShowTransaction(): void
    {
        // given
        $adminUser = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'transaction_user2@exmaple.com');
        $this->httpClient->loginUser($adminUser);

        $transaction = new Transaction();
        $transaction->setName('TName');
        $transaction->setDate(DateTime::createFromFormat('Y-m-d', "2021-05-09"));
        $transaction->setAmount('11');
        $transaction->setCategory($this->createCategory());
        $transaction->setWallet($this->createWallet($adminUser));
        $transaction->setOperation($this->createOperation());
        $transaction->setPayment($this->createPayment());
        $transaction->addTag($this->createTag());
        $transaction->setAuthor($adminUser);
        $transactionRepository = static::getContainer()->get(TransactionRepository::class);
        $transactionRepository->save($transaction);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $transaction->getId());
        $result = $this->httpClient->getResponse();

        // then
        $this->assertEquals(200, $result->getStatusCode());
        $this->assertSelectorTextContains('html td', $transaction->getId());
        // ... more assertions...
    }

    //create transaction

    /**
     * @throws OptimisticLockException
     * @throws NotFoundExceptionInterface
     * @throws ORMException
     * @throws ContainerExceptionInterface
     */
    public function testCreateTransaction(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value],
            'transaction_created_user2@example.com');
        $this->httpClient->loginUser($user);
        $transactionTransactionName = "createdTransaction";
        $transactionRepository = static::getContainer()->get(TransactionRepository::class);
        $tomorrow = time();
        $date = [
            'year' => (int)date('Y', $tomorrow),
            'month' => (int)date('m', $tomorrow),
            'day' => (int)date('d', $tomorrow),
        ];
        $this->httpClient->request('GET', self::TEST_ROUTE . '/new');
        // when
        $this->httpClient->submitForm(
            'Zapisz',
            ['transaction' =>
                [
                    'name' => $transactionTransactionName,
                    'date' => $date,
                    'wallet' => $this->createWallet($user)->getId(),
                    'category' => $this->createCategory()->getId(),
                    'operation' => $this->createOperation()->getId(),
                    'payment' => $this->createPayment()->getId(),
                    'tags' => $this->createTag()->getName()
                ]
            ]
        );

        // then
        $savedTransaction = $transactionRepository->findOneByName($transactionTransactionName);
        $this->assertEquals($transactionTransactionName,
            $savedTransaction->getName());


        $result = $this->httpClient->getResponse();
        $this->assertEquals(303, $result->getStatusCode());

    }

    /**
     * @return void
     */
    public function testEditTransactionUnauthorizedUser(): void
    {
        // given
        $expectedHttpStatusCode = 302;
        $user = null;
        try {
            $user = $this->createUser([UserRole::ROLE_USER->value],
                'transaction_auto_user1@example.com');
        } catch (OptimisticLockException|ContainerExceptionInterface|ORMException $e) {
        }
        $transaction = new Transaction();
        $transaction->setName('TName');
        $transaction->setDate(DateTime::createFromFormat('Y-m-d', "2021-05-09"));
        $transaction->setAmount('11');
        $transaction->setCategory($this->createCategory());
        $transaction->setWallet($this->createWallet($user));
        $transaction->setOperation($this->createOperation());
        $transaction->setPayment($this->createPayment());
        $transaction->addTag($this->createTag());
        $transaction->setAuthor($user);
        $transactionRepository =
            static::getContainer()->get(TransactionRepository::class);
        $transactionRepository->save($transaction);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
            $transaction->getId() . '/edit');
        $actual = $this->httpClient->getResponse();

        // then

        $this->assertEquals($expectedHttpStatusCode,
            $actual->getStatusCode());

    }


    /**
     * @return void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testEditTransaction(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value],
            'transaction_edit_user1@example.com');
        $this->httpClient->loginUser($user);

        $transactionRepository =
            static::getContainer()->get(TransactionRepository::class);
        $transaction = new Transaction();
        $transaction->setName('TName');
        $transaction->setDate(DateTime::createFromFormat('Y-m-d', "2021-05-09"));
        $transaction->setAmount('11');
        $transaction->setCategory($this->createCategory());
        $transaction->setWallet($this->createWallet($user));
        $transaction->setOperation($this->createOperation());
        $transaction->setPayment($this->createPayment());
        $transaction->addTag($this->createTag());
        $transaction->setAuthor($user);
        $transactionRepository->save($transaction);
        $testTransactionId = $transaction->getId();
        $expectedNewTransactionName = 'TestTransactionEdit';

        $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
            $testTransactionId . '/edit');

        // when
        $this->httpClient->submitForm(
            'Edytuj',
            ['transaction' =>
                ['name' => $expectedNewTransactionName,
                    'date' => new DateTime('now'),
                    'category' => $this->createCategory(),
                    'wallet' => $this->createWallet($user),
                    'operation' => $this->createOperation(),
                    'payment' => $this->createPayment(),
                    'tags' => $this->createTag()->getName()
                ]
            ]
        );

        // then
        $savedTransaction = $transactionRepository->findOneById($testTransactionId);
        $this->assertEquals($expectedNewTransactionName,
            $savedTransaction->getName());
    }


    /**
     * @throws OptimisticLockException
     * @throws NotFoundExceptionInterface
     * @throws ORMException
     * @throws ContainerExceptionInterface
     */
    public function testNewRoutAdminUser(): void
    {
        //given
        $adminUser = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'transactionCreate1@example.com');
        $this->httpClient->loginUser($adminUser);
        //when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/');
        //then
        $this->assertEquals(301, $this->httpClient->getResponse()->getStatusCode());
    }

    /**
     * @return void
     */
    public function testDeleteTransaction(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value],
            'transaction_deleted_user1@example.com');
        $this->httpClient->loginUser($user);

        $transactionRepository =
            static::getContainer()->get(TransactionRepository::class);
        $transaction = new Transaction();
        $transaction->setName('TName');
        $transaction->setDate(DateTime::createFromFormat('Y-m-d', "2021-05-09"));
        $transaction->setAmount('11');
        $transaction->setCategory($this->createCategory());
        $transaction->setWallet($this->createWallet($user));
        $transaction->setOperation($this->createOperation());
        $transaction->setPayment($this->createPayment());
        $transaction->addTag($this->createTag());
        $transaction->setAuthor($user);
        $transactionRepository->save($transaction);
        $testTransactionId = $transaction->getId();

        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $testTransactionId . '/delete');

        //when
        $this->httpClient->submitForm(
            'Usuń'
        );

        // then
        $this->assertNull($transactionRepository->findOneByName('TestTransactionCreated'));
    }
}
