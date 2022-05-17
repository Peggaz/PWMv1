<?php

namespace App\Tests\Controller;

use JetBrains\PhpStorm\Pure;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WalletControllerTest extends WebTestCase
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

    #[Pure] public function testShow()
    {
        $this->assertEquals(1, 1);
    }

    public function testIndex()
    {
        $this->assertEquals(1, 1);
    }

    public function testRoute()
    {
        $this->assertEquals(1, 1);
    }
}
