<?php
/**
 * Operation Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Category;
use App\Entity\Enum\UserRole;
use App\Entity\Operation;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\OperationRepository;
use App\Repository\UserRepository;
use App\Tests\WebBaseTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

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
        $operationRepository = self::$container->get(OperationRepository::class);
        $operationRepository->save($expectedOperation);
        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $result = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $result);
    }


    // edit
    public function testEditOperation(): void
    {
        // create operation
        $expectedOperation = new Operation();
        $expectedOperation->setName('TNameOperation');
        $expectedOperation->setUpdatedAt(new \DateTime('now'));
        $expectedOperation->setCreatedAt(new \DateTime('now'));
        $operationRepository = self::$container->get(OperationRepository::class);
        $operationRepository->save($expectedOperation);

        $expected = 'TNameOperationChanged';
        // change name
        $expectedOperation->setName('TNameOperationChanged');
        $expectedOperation->setUpdatedAt(new \DateTime('now'));
        $expectedOperation->setCreatedAt(new \DateTime('now'));
        $operationRepository->save($expectedOperation);

        $this->assertEquals($expected, $operationRepository->findOneByName($expected)->getName());
    }

    // delete
    public function testDeleteCategory(): void
    {
        $operationRepository = self::$container->get(OperationRepository::class);
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
