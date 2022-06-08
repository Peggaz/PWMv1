<?php

namespace App\Tests\Controller;

use App\Tests\WebBaseTestCase;
use JetBrains\PhpStorm\Pure;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends WebBaseTestCase
{
    #[Pure] public function testShow()
    {
        $this->assertEquals(1, 1);
    }

    public function testIndex()
    {
        $this->assertEquals(1, 1);
    }
}
