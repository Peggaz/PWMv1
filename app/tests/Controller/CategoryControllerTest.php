<?php
/**
 * Category Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Category;
use App\Entity\Enum\UserRole;
use App\Entity\User;
use App\Repository\CategoryRepository;
use App\Repository\UserRepository;
use App\Tests\WebBaseTestCase;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CategoryControllerTest.
 */
class CategoryControllerTest extends WebBaseTestCase
{
    /**
     * Test route.
     *
     * @const string
     */
    public const TEST_ROUTE = '/category';

    /**
     * Test client.
     */
    private KernelBrowser $httpClient;

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
        $expectedStatusCode = 302;

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
        $adminUser = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'user@example.com');
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
        $user = $this->createUser([UserRole::ROLE_USER->value], 'user1@example.com');
        $this->httpClient->loginUser($user);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals(200, $resultStatusCode);
    }



    /**
     * Test show single category.
     *
     * @throws ContainerExceptionInterface|NotFoundExceptionInterface|ORMException|OptimisticLockException
     */
    public function testShowCategory(): void
    {
        // given
        $adminUser = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'user2@exmaple.com');
        $this->httpClient->loginUser($adminUser);

        $expectedCategory = new Category();
        $expectedCategory->setName('Test category');
        $expectedCategory->setCreatedAt(new \DateTime('now'));
        $expectedCategory->setUpdatedAt(new \DateTime('now'));
        $categoryRepository = static::getContainer()->get(CategoryRepository::class);
        $categoryRepository->save($expectedCategory);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $expectedCategory->getId());
        $result = $this->httpClient->getResponse();

        // then
        $this->assertEquals(200, $result->getStatusCode());
        $this->assertSelectorTextContains('html h1', '#' . $expectedCategory->getId());
        // ... more assertions...
    }

    //create category
    public function testCreateCategory(): void
    {
        $this->httpClient->request('GET', self::TEST_ROUTE . '/create');
        $result = $this->httpClient->getResponse();
        $this->assertEquals(302, $result->getStatusCode());

    }

    // edit category
    public function testEditCategory(): void
    {
        // create category
        $category = new Category();
        $category->setName('TestCategory');
        $category->setCreatedAt(new \DateTime('now'));
        $category->setUpdatedAt(new \DateTime('now'));
        $categoryRepository = self::$container->get(CategoryRepository::class);
        $categoryRepository->save($category);


        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $category->getId() . '/edit');
        $result = $this->httpClient->getResponse();
        $this->assertEquals(302, $result->getStatusCode());
        $category->setName('TestCategoryEdit');
        $this->httpClient->request('PUT', self::TEST_ROUTE . '/' . $category->getId() . '/edit/', ['$category' => $category]);

        $this->assertEquals('TestCategoryEdit', $categoryRepository->findOneById($category->getId())->getName());

        $expected = 'TestChanged';
        // change name
        $category->setName('TestChanged');
        $categoryRepository->save($category);

        $this->assertEquals($expected, $categoryRepository->findOneByName($expected)->getName());

    }


    public function testDeleteCategory(): void
    {
        // create category
        $category = new Category();
        $category->setName('TestCategory12');
        $category->setCreatedAt(new \DateTime('now'));
        $category->setUpdatedAt(new \DateTime('now'));
        $categoryRepository = self::$container->get(CategoryRepository::class);
        $categoryRepository->save($category);
        $this->assertCount(1, $categoryRepository->findByName('TestCategory12'));
        // delete
        $this->httpClient->request('DELETE', self::TEST_ROUTE . '/' . $category->getId() . '/delete'/*, ['category'=>'$category']*/);

        $this->assertCount(0, $categoryRepository->findByName('TestCategory12'));
    }
}
