<?php
/**
 * Wallet Controller test.
 */

namespace App\Tests\Controller;

use App\Entity\Enum\UserRole;
use App\Entity\User;
use App\Entity\Wallet;
use App\Repository\UserRepository;
use App\Repository\WalletRepository;
use App\Tests\WebBaseTestCase;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Class WalletControllerTest.
 */
class WalletControllerTest extends WebBaseTestCase
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
        $expectedStatusCode = 200;
        $user = $this->createUser([UserRole::ROLE_ADMIN->value], 'walletindexuser@example.com');
        $this->logIn($user);
        // when
        $this->httpClient->request('GET', '/wallet');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test index route for admin user.
     */
    public function testIndexRouteAdminUser(): void
    {
        $expectedStatusCode = 302;
        $adminUser = $this->createUser([UserRole::ROLE_USER->value, UserRole::ROLE_ADMIN->value], 'user432@example.com');
        $this->httpClient->loginUser($adminUser);

        // when
        $this->httpClient->request('GET', '/wallet/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Test create film for admin user.
     */
    public function testCreateWalletAdminUser(): void
    {
        // given
        $expectedStatusCode = 301;
        $admin = $this->createUser(['ROLE_ADMIN', 'ROLE_USER'], 'user123@example.com');
        $this->logIn($admin);
        // when
        $this->httpClient->request('GET', '/wallet/create/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }


    /**
     * Test index route for non authorized user FOR NEW Wallet.
     */
    public function testIndexRouteNonAuthorizedUser(): void
    {
        // given
        $expectedStatusCode = 301;
        $user = $this->createUser(['ROLE_USER'], 'user124@example.com');
        $this->logIn($user);

        // when
        $this->httpClient->request('GET', '/wallet/create/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    public function testEditWallet(): void
    {
        // create category
        $wallet = new Wallet();
        $wallet->setName('TestWallet123');
        $wallet->setCreatedAt(new \DateTime('now'));
        $wallet->setUpdatedAt(new \DateTime('now'));
        $wallet->setUser($this->createUser([UserRole::ROLE_USER->value], 'user1235@example.com'));
        $wallet->setBalance(2000);
        $walletRepository = self::$container->get(WalletRepository::class);
        $walletRepository->save($wallet);

        $expected = 'TestChangedWallet123.';
        // change name
        $wallet->setName('TestChangedWallet123.');
        $wallet->setBalance(3000);
        $walletRepository->save($wallet);

        $this->assertEquals($expected, $walletRepository->findOneByName($expected)->getName());

    }
}