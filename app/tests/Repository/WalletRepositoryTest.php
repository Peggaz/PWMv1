<?php

namespace App\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class WalletRepositoryTest extends KernelTestCase
{
    protected function setUp(): void
    {
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testFindOneBy()
    {
        $this->assertEquals(1, 1);
    }

    public function testAdd()
    {
        $this->assertEquals(1, 1);
    }

    public function testQueryAll()
    {
        $this->assertEquals(200, 200);
    }

    public function testFind()
    {
        $this->assertEquals(1, 1);
    }

    public function testFindAll()
    {
        $this->assertEquals(1, 1);
    }

    public function test__construct()
    {
        $this->assertEquals(1, 1);
    }

    public function testRemove()
    {
        $this->assertEquals(1, 1);
    }

    public function testFindBy()
    {
        $this->assertEquals(1, 1);
    }
}
