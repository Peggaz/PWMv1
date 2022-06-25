<?php
/**
 * User Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Enum\UserRole;
use App\Repository\UserRepository;
use App\Tests\WebBaseTestCase;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class UserControllerTest.
 */
class UserControllerTest extends WebBaseTestCase
{
    /**
     * Test route.
     *
     * @const string
     */
    public const TEST_ROUTE = '/user';


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
            $user = $this->createUser([UserRole::ROLE_ADMIN->value], 'userindexuser@example.com');
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
        $adminUser = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'user_user@example.com');
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
        $user = $this->createUser([UserRole::ROLE_USER->value], 'user_user2@example.com');
        $this->httpClient->loginUser($user);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals(200, $resultStatusCode);
    }


    /**
     * Test show single user.
     *
     * @throws ContainerExceptionInterface|NotFoundExceptionInterface|ORMException|OptimisticLockException
     */
    public function testShowUser(): void
    {
        // given
        $adminUser = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'user_user2@exmaple.com');
        $this->httpClient->loginUser($adminUser);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $adminUser->getId());
        $result = $this->httpClient->getResponse();

        // then
        $this->assertEquals(200, $result->getStatusCode());
        $this->assertSelectorTextContains('html dd', $adminUser->getId());
        // ... more assertions...
    }

    //create user

    /**
     * @throws OptimisticLockException
     * @throws NotFoundExceptionInterface
     * @throws ORMException
     * @throws ContainerExceptionInterface
     */
    public function testCreateUser(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value],
            'user_created_user2@example.com');
        $this->httpClient->loginUser($user);
        $userUserName = "createdUser";
        $userRepository = static::getContainer()->get(UserRepository::class);
        $this->httpClient->request('GET', self::TEST_ROUTE . '/create');

        // when
        $this->httpClient->submitForm(
            'utworzenie',
            ['user' =>
                [
                    'email' => 'newuser_create@example.com',
                    'password' => '1234',
                    'roles' => [UserRole::ROLE_ADMIN->value]
                ]
            ]
        );

        // then
        $savedUser = $userRepository->findOneByName($userUserName);
        $this->assertEquals($userUserName,
            $savedUser->getName());
        $this->assertNotNull($savedUser->getCreatedAt());
        $this->assertNotNull($savedUser->getUpdatedAt());
        $this->assertEquals($userUserName, $savedUser->getUsername());


        $result = $this->httpClient->getResponse();
        $this->assertEquals(303, $result->getStatusCode());

    }

    /**
     * @return void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function testEditUser(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value],
            'user_edit_user1@example.com');
        $this->httpClient->loginUser($user);
        $userRepository = static::getContainer()->get(UserRepository::class);
        $expectedNewUserName = 'newuser_edit@example.com';

        $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
            $user->getId() . '/edit');

        // when
        $this->httpClient->submitForm(
            'Edytuj',
            ['user' =>
                [
                    'email' => $expectedNewUserName,
                    'password' => '1234',
                    'roles' => [UserRole::ROLE_ADMIN->value]
                ]
            ]
        );

        // then

        $savedUser = $userRepository->findOneById($user->getId());
        $this->assertEquals($expectedNewUserName,
            $savedUser->getName());
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
        $adminUser = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'userCreate1@example.com');
        $this->httpClient->loginUser($adminUser);
        //when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/');
        //then
        $this->assertEquals(301, $this->httpClient->getResponse()->getStatusCode());
    }

    /**
     * @return void
     */
    public function testDeleteUser(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value],
            'user_deleted_user1@example.com');
        $this->httpClient->loginUser($user);

        $userRepository =
            static::getContainer()->get(UserRepository::class);
        $testUserId = $user->getId();

        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $testUserId . '/delete');

        //when
        $this->httpClient->submitForm(
            'usuń'
        );

        // then
        //$this->assertEquals(self::TEST_ROUTE, $this->httpClient->getResponse());
        $this->assertNull($userRepository->findOneByEmail('user_deleted_user1@example.com'));
    }
}
