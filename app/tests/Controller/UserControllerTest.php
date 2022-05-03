<?php

namespace App\Tests\Controller;

use App\Controller\UserController;
use JetBrains\PhpStorm\Pure;
use PHPUnit\Framework\TestCase;

class UserControllerTest extends TestCase
{
    #[Pure] public function testShow()
    {
        $user = new UserController();
    }

    public function testIndex()
    {

    }
}
