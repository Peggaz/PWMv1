<?php
/**
 * Payment Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Payment;
use App\Entity\Enum\UserRole;
use App\Entity\User;
use App\Repository\PaymentRepository;
use App\Repository\UserRepository;
use App\Tests\WebBaseTestCase;
use DateTime;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class PaymentControllerTest.
 */
class PaymentControllerTest extends WebBaseTestCase
{
    /**
     * Test route.
     *
     * @const string
     */
    public const TEST_ROUTE = '/payment';


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
        $expectedStatusCode = 200;
        $user = $this->createUser([UserRole::ROLE_ADMIN->value], 'paymentindexuser@example.com');
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
        $adminUser = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'user435@example.com');
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
        $user = $this->createUser([UserRole::ROLE_USER->value], 'user1345@example.com');
        $this->httpClient->loginUser($user);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals(200, $resultStatusCode);

    }


    /**
     * Test show single payment.
     *
     * @throws ContainerExceptionInterface|NotFoundExceptionInterface|ORMException|OptimisticLockException
     */
    public function testShowPayment(): void
    {
        // given
        $adminUser = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'paymentuser2@exmaple.com');
        $this->httpClient->loginUser($adminUser);

        $expectedPayment = new Payment();
        $expectedPayment->setName('Test payment');
        $expectedPayment->setCreatedAt(new \DateTime('now'));
        $expectedPayment->setUpdatedAt(new \DateTime('now'));
        $paymentRepository = static::getContainer()->get(PaymentRepository::class);
        $paymentRepository->save($expectedPayment);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $expectedPayment->getId());
        $result = $this->httpClient->getResponse();

        // then
        $this->assertEquals(200, $result->getStatusCode());
        $this->assertSelectorTextContains('td', $expectedPayment->getId());
        $paymentRepository->delete($expectedPayment);
        // ... more assertions...
    }

    //create payment
    public function testCreatePayment(): void
    {
        $this->httpClient->request('GET', self::TEST_ROUTE . '/create');
        $result = $this->httpClient->getResponse();
        $this->assertEquals(302, $result->getStatusCode());

    }

    // edit payment
    public function testEditPayment(): void
    {
        // create payment
        $payment = new Payment();
        $payment->setName('TestPayment');
        $payment->setCreatedAt(new \DateTime('now'));
        $payment->setUpdatedAt(new \DateTime('now'));
        $paymentRepository = self::$container->get(PaymentRepository::class);
        $paymentRepository->save($payment);


        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $payment->getId() . '/edit');
        $result = $this->httpClient->getResponse();
        $this->assertEquals(302, $result->getStatusCode());
        $payment->setName('TestPaymentEdit');
        $this->httpClient->request('PUT', self::TEST_ROUTE . '/' . $payment->getId() . '/edit/',
            ['payment' =>
                $this->httpClient->submitForm('save', [
                    'payment[name]' => 'TestCategoryEdit',
                    'payment[createdAt]' => new DateTime('now'),
                    'payment[updatedAt]' => new DateTime('now'),
                ])
            ]);
        $this->assertEquals('TestPaymentEdit', $paymentRepository->findOneById($payment->getId())->getName());

        $expected = 'TestChanged';
        // change name
        $payment->setName('TestChanged');
        $paymentRepository->save($payment);

        $this->assertEquals($expected, $paymentRepository->findOneByName($expected)->getName());

    }


    public function testDeletePayment(): void
    {
        // create payment
        $payment = new Payment();
        $payment->setName('TestPayment12');
        $payment->setCreatedAt(new \DateTime('now'));
        $payment->setUpdatedAt(new \DateTime('now'));
        $paymentRepository = self::$container->get(PaymentRepository::class);
        $paymentRepository->save($payment);
        $this->assertCount(1, $paymentRepository->findByName('TestPayment12'));
        // delete
        $this->httpClient->request('DELETE', self::TEST_ROUTE . '/' . $payment->getId() . '/delete', ['payment'=>$payment]);

        $this->assertCount(0, $paymentRepository->findByName('TestPayment12'));
    }
}
