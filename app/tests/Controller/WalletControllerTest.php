<?php
/**
 * Wallet Controller test.
 */

namespace App\Tests\Controller;

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
        $expectedStatusCode = 200;
        $adminUser = $this->createUser([User::ROLE_USER, User::ROLE_ADMIN]);
        $this->logIn($adminUser);

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
        $admin = $this->createUser(['ROLE_ADMIN', 'ROLE_USER']);
        $this->logIn($admin);
        // when
        $this->httpClient->request('GET', '/wallet/create/');
        $resultStatusCode = $this->httpClient->getResponse()->getStatusCode();

        // then
        $this->assertEquals($expectedStatusCode, $resultStatusCode);
    }

    /**
     * Create user.
     *
     * @param array $roles User roles
     *
     * @return User User entity
     */
    private function createUser(array $roles): User
    {
        $passwordEncoder = self::$container->get('security.password_encoder');
        $user = new User();
        $user->setEmail('user1@example.com');
        $user->setRoles($roles);
        $user->setPassword(
            $passwordEncoder->encodePassword(
                $user,
                'p@55w0rd'
            )
        );
        $userRepository = self::$container->get(UserRepository::class);
        $userRepository->save($user);

        return $user;
    }

    /**
     * Simulate user log in.
     *
     * @param User $user User entity
     */
    private function logIn(User $user): void
    {
        $session = self::$container->get('session');

        $firewallName = 'main';
        $firewallContext = 'main';

        $token = new UsernamePasswordToken($user, null, $firewallName, $user->getRoles());
        $session->set('_security_' . $firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->httpClient->getCookieJar()->set($cookie);
    }

    /**
     * Test index route for non authorized user FOR NEW Wallet.
     */
    public function testIndexRouteNonAuthorizedUser(): void
    {
        // given
        $expectedStatusCode = 301;
        $user = $this->createUser([User::ROLE_USER]);
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
        $wallet->setBalance(2000);
        $walletRepository = self::$container->get(WalletRepository::class);
        $walletRepository->save($wallet);

        $expected = 'TestChangedWallet123.';
        // change name
        $wallet->setName('TestChangedWallet123.');
        $wallet->setBalance(3000);
        $walletRepository->save($wallet);

        $this->assertEquals($expected, $walletRepository->findByName($expected)->getName());

    }
}