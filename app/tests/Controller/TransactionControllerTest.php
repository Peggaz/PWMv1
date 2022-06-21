<?php
/**
 * Category Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Category;
use App\Entity\Enum\UserRole;
use App\Entity\Operation;
use App\Entity\Payment;
use App\Entity\Tag;
use App\Entity\Transaction;
use App\Entity\Wallet;
use App\Repository\CategoryRepository;
use App\Repository\OperationRepository;
use App\Repository\PaymentRepository;
use App\Repository\TagRepository;
use App\Repository\TransactionRepository;
use App\Repository\WalletRepository;
use App\Tests\WebBaseTestCase;

/**
 * Class CategoryControllerTest.
 */
class TransactionControllerTest extends WebBaseTestCase
{

    /**
     * Set up tests.
     */
    public function setUp(): void
    {
        $this->httpClient = static::createClient();
    }

    /**
     * Test index route for anonymous user.
     */
    public function testIndexRouteAnonymousUser(): void
    {
        // given
        $expectedStatusCode = 301;
        $user = $this->createUser([UserRole::ROLE_ADMIN->value], 'transactionexuser@example.com');
        $this->logIn($user);
        // when
        $this->httpClient->request('GET', '/transaction/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test index route for anonymous user.
     */
    public function testIndexRouteAdminUser(): void
    {
        // given
        $expectedStatusCode = 301;
        $admin = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'transactioAdmin@example.com');
        $this->httpClient->loginUser($admin);
        // when
        $this->httpClient->request('GET', '/transaction/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    public function testShowTransaction(): void
    {
        // given
        $expectedStatusCode = 302;
        $expectedTransaction = $this->createTransaction('user_transaction3@example.com');
        $transactionRepository = self::getContainer()->get(TransactionRepository::class);
        $id = $expectedTransaction->getId();
        // when
        $this->httpClient->request('GET', '/transaction/' . $id);
        $result = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $result);
        $transactionRepository->delete($expectedTransaction);
    }

    /**
     * Create category.
     */
    private function createCategory()
    {
        $category = new Category();
        $category->setName('TName');
        $category->setUpdatedAt(new \DateTime('now'));
        $category->setCreatedAt(new \DateTime('now'));
        $categoryRepository = self::getContainer()->get(CategoryRepository::class);
        $categoryRepository->save($category);

        return $category;
    }

    /**
     * Create Payment.
     * @return Payment
     */
    private function createPayment()
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
    private function createOperation()
    {
        $operation = new Operation();
        $operation->setName('TOperation');
        $operationRepository = self::getContainer()->get(OperationRepository::class);
        $operationRepository->save($operation);

        return $operation;
    }

    /**
     * Create Tag.
     * @return Tag
     */
    private function createTag()
    {
        $tag = new Tag();
        $tag->setName('TTag');
        $tagRepository = self::getContainer()->get(TagRepository::class);
        $tagRepository->save($tag);

        return $tag;
    }

    /**
     * Create Wallet.
     * @return Wallet
     */
    private function createWallet(String $email): Wallet
    {
        $wallet = new Wallet();
        $wallet->setName('TWallet');
        $wallet->setBalance('1000');
        $wallet->setUser($this->createUser([UserRole::ROLE_USER->value], $email));
        $walletRepository = self::getContainer()->get(WalletRepository::class);
        $walletRepository->save($wallet);

        return $wallet;
    }

    /**
     * Test index route for anonymous user.
     */
    public function testIndexRouteSearch(): void
    {
        // given
        $expectedStatusCode = 302;

        // when
        $aa = $this->httpClient->request('GET', '/transaction/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }



    /**
     * Create transaction.
     */
    private function createTransaction(string $email): Transaction
    {
        $transaction = new Transaction();
        $transaction->setName('TName');
        $transaction->setDate(\DateTime::createFromFormat('Y-m-d', "2021-05-09"));
        $transaction->setAmount('11');
        $transaction->setCategory($this->createCategory());
        $transaction->setWallet($this->createWallet($email));
        $transaction->setOperation($this->createOperation());
        $transaction->setPayment($this->createPayment());
        $transaction->addTag($this->createTag());
        $transaction->setAuthor($this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'transaction'.$email));

        $transactionRepository = self::getContainer()->get(TransactionRepository::class);
        $transactionRepository->save($transaction);

        return $transaction;

    }

    /**
     * Test create transaction for admin user.
     */
    public function testCreateTransactionAdminUser(): void
    {
        // given
        $expectedStatusCode = 301;
        $admin = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'transaction_user1@example.com');
        $this->logIn($admin);
        // when
        $this->httpClient->request('GET', '/transaction/create/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test create transaction for admin user.
     */
    public function testCreateTransactionNonAdmin(): void
    {
        // given
        $expectedStatusCode = 301;
        $admin = $this->createUser([UserRole::ROLE_USER->value], 'user01@example.com');
        $this->logIn($admin);
        // when
        $this->httpClient->request('GET', '/transaction/create/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }


    // edit transaction
    public function testEditTransaction(): void
    {
        $transaction = $this->createTransaction('user_transaction@example.com');

        $transaction->setName('ChangedTransactionName');
        $transaction->setUpdatedAt(new \DateTime('now'));
        $transaction->setUpdatedAt(new \DateTime('now'));

        $transactionRepository = self::getContainer()->get(TransactionRepository::class);
        $transactionRepository->save($transaction);

        $expected = 'ChangedTransactionName';

        $this->assertEquals($expected, $transactionRepository->findOneByName($expected)->getName());
        $transactionRepository->delete($transaction);

    }

    // delete transaction

    public function testDeleteTransaction()
    {
        $transaction = $this->createTransaction('user_transaction2@example.com');
        $transaction->setName('ChangedTransactionName');

        $transactionRepository = self::getContainer()->get(TransactionRepository::class);
        $transactionRepository->save($transaction);


        $this->assertNotNull($transactionRepository->findOneByName('ChangedTransactionName'));
        $transactionRepository->delete($transaction);
    }


}
