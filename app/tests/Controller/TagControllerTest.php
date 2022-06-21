<?php
/**
 * Tag Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Enum\UserRole;
use App\Entity\Tag;
use App\Repository\TagRepository;
use App\Tests\WebBaseTestCase;
use DateTime;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

/**
 * Class TagControllerTest.
 */
class TagControllerTest extends WebBaseTestCase
{
    /**
     * Test route.
     *
     * @const string
     */
    public const TEST_ROUTE = '/tag';


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
        $user = $this->createUser([UserRole::ROLE_ADMIN->value], 'tagindexuser@example.com');
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
        $expectedStatusCode = 301;
        $adminUser = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'taguser@example.com');
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
        $user = $this->createUser([UserRole::ROLE_USER->value], 'taguser1@example.com');
        $this->httpClient->loginUser($user);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE);
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals(301, $resultStatusCode);
    }


    /**
     * Test show single tag.
     *
     * @throws ContainerExceptionInterface|NotFoundExceptionInterface|ORMException|OptimisticLockException
     */
    public function testShowTag(): void
    {
        // given
        $adminUser = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'taguser2@exmaple.com');
        $this->httpClient->loginUser($adminUser);

        $expectedTag = new Tag();
        $expectedTag->setName('Test tag');
        $expectedTag->setCreatedAt(new DateTime('now'));
        $expectedTag->setUpdatedAt(new DateTime('now'));
        $tagRepository = static::getContainer()->get(TagRepository::class);
        $tagRepository->save($expectedTag);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $expectedTag->getId());
        $result = $this->httpClient->getResponse();

        // then
        $this->assertEquals(200, $result->getStatusCode());
        $this->assertSelectorTextContains('td', $expectedTag->getId());
        // ... more assertions...
    }

    //create tag
    public function testCreateTag(): void
    {
        $this->httpClient->request('GET', self::TEST_ROUTE . '/create');
        $result = $this->httpClient->getResponse();
        $this->assertEquals(302, $result->getStatusCode());

    }

    public function testEditTagUnauthorizedUser(): void
    {
        // given
        $expectedHttpStatusCode = 302;

        $tag = new Tag();
        $tag->setName('TestTag');
        $tag->setCreatedAt(new DateTime('now'));
        $tag->setUpdatedAt(new DateTime('now'));
        $tagRepository =
            static::getContainer()->get(TagRepository::class);
        $tagRepository->save($tag);

        // when
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
            $tag->getId() . '/edit');
        $actual = $this->httpClient->getResponse();

        // then

        $this->assertEquals($expectedHttpStatusCode,
            $actual->getStatusCode());

    }


    public function testEditTag(): void
    {
        // given
        $user = $this->createUser([UserRole::ROLE_USER->value],
            'tag_edit_user1@example.com');
        $this->httpClient->loginUser($user);

        $tagRepository =
            static::getContainer()->get(TagRepository::class);
        $testTag = new Tag();
        $testTag->setName('TestTag');
        $testTag->setCreatedAt(new DateTime('now'));
        $testTag->setUpdatedAt(new DateTime('now'));
        $tagRepository->save($testTag);
        $testTagId = $testTag->getId();
        $expectedNewTagName = 'TestTagEdit';

        $this->httpClient->request('GET', self::TEST_ROUTE . '/' .
            $testTagId . '/edit');

        // when
        $this->httpClient->submitForm(
            'Edytuj',
            ['tag' => [
                'id' => $testTagId,
                'name' => $expectedNewTagName,
                'updatedAt' => $testTag->getUpdatedAt(),
                'createdAt' => $testTag->getCreatedAt(),
            ]
            ]
        );

        // then
        $savedTag = $tagRepository->findOneById($testTagId);
        $this->assertEquals($expectedNewTagName,
            $savedTag->getName());
    }


    public function testNewRoutAdminUser(): void
    {
        $adminUser = $this->createUser([UserRole::ROLE_ADMIN->value, UserRole::ROLE_USER->value], 'tagCreate1@example.com');
        $this->httpClient->loginUser($adminUser);
        $this->httpClient->followRedirect();
        $this->httpClient->request('GET', self::TEST_ROUTE . '/');
        $this->assertEquals(200, $this->httpClient->getResponse()->getStatusCode());
    }

    public function testDeleteTag(): void
    {
        // create tag
        $tag = new Tag();
        $tag->setName('TestTag12');
        $tag->setCreatedAt(new DateTime('now'));
        $tag->setUpdatedAt(new DateTime('now'));
        $tagRepository = self::getContainer()->get(TagRepository::class);
        $tagRepository->save($tag);
        $this->assertNotNull($tagRepository->findByName('TestTag12'));
        // delete
        $this->httpClient->request('GET', self::TEST_ROUTE . '/' . $tag->getId() . '/delete');
        $this->httpClient->request('DELETE', self::TEST_ROUTE . '/' . $tag->getId() . '/delete/',
            ['tag' =>
                $this->httpClient->submitForm('delete', [])
            ]);
        $this->assertNull($tagRepository->findOneByName('TestTag12'));
    }
}
