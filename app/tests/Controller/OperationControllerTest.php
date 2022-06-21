<?php
/**
 * Operation Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Enum\UserRole;
use App\Entity\Operation;
use App\Repository\OperationRepository;
use App\Tests\WebBaseTestCase;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class OperationControllerTest.
 */
class OperationControllerTest extends WebBaseTestCase
{

    /**
     * Test route.
     *
     * @const string
     */
    public const TEST_ROUTE = '/operation';

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
        $user = $this->createUser([UserRole::ROLE_ADMIN->value], 'operationindexuser@example.com');
        $this->logIn($user);
        // when
        $this->httpClient->request('GET', '/operation');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test index route for admin user.
     */
    public function testIndexRouteAdminUser(): void
    {
        $expectedStatusCode = 200;
        $adminUser = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'admin1@example.com');
        $this->httpClient->loginUser($adminUser);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test Operation.
     */
    public function testOperation(): void
    {
        // given
        $expectedStatusCode = 200;
        $admin = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'admin0@example.com');
        $this->httpClient->loginUser($admin);
        $expectedOperation = new Operation();
        $expectedOperation->setName('TName');
        $expectedOperation->setUpdatedAt(new \DateTime('now'));
        $expectedOperation->setCreatedAt(new \DateTime('now'));
        $operationRepository = self::getContainer()->get(OperationRepository::class);
        $operationRepository->save($expectedOperation);
        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $result = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $result);
    }

    /**
     * @return void
     */
    public function testEditOperationUnauthorizedUser(): void
    {
        // given
        $expectedHttpStatusCode = 302;

        $operation = new Operation();
        $operation->setName('TestOperation');
        $operation->setCreatedAt(new \DateTime('now'));
        $operation->setUpdatedAt(new \DateTime('now'));
        $operationRepository =
            static::getContainer()->get(OperationRepository::class);
        $operationRepository->save($operation);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
            $operation->getId() . '/edit');
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
    public function testEditOperation(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value],
            'operation_edit_user1@example.com');
        $this->httpClient->loginUser($user);

        $operationRepository =
            static::getContainer()->get(OperationRepository::class);
        $testOperation = new Operation();
        $testOperation->setName('TestOperation');
        $testOperation->setCreatedAt(new \DateTime('now'));
        $testOperation->setUpdatedAt(new \DateTime('now'));
        $operationRepository->save($testOperation);
        $testOperationId = $testOperation->getId();
        $expectedNewOperationName = 'TestOperationEdit';

        $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
            $testOperationId . '/edit');

        // when
        $this->httpClient->submitForm(
            'Edytuj',
            ['operation' => ['name' => $expectedNewOperationName]]
        );

        // then
        $savedOperation = $operationRepository->findOneById($testOperationId);
        $this->assertEquals($expectedNewOperationName,
            $savedOperation->getName());
    }

    // delete
    public function testDeleteOperation(): void
    {
        $operationRepository = self::getContainer()->get(OperationRepository::class);
        // create operation
        $expectedOperation = new Operation();
        $countOperations = count($operationRepository->findAll());
        $expectedOperation->setName('TNameOperation2');
        $expectedOperation->setUpdatedAt(new \DateTime('now'));
        $expectedOperation->setCreatedAt(new \DateTime('now'));

        $operationRepository->save($expectedOperation);
        $this->assertCount($countOperations + 1, $operationRepository->findAll());

        // delete
        $operationRepository->delete($expectedOperation);
        $this->assertCount($countOperations, $operationRepository->findAll());
    }
}
