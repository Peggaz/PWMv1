<?php

namespace App\Tests\Forms;

use App\Entity\Wallet;
use App\Form\Type\WalletType;
use DateTime;
use Symfony\Component\Form\Test\TypeTestCase;

class WalletTypeTest extends TypeTestCase
{
    public function testSubmitValidDate()
    {
        $time = new DateTime('now');
        $formatData = [
            'name' => 'TestWallet',
            'balance' => 2000,
            'createdAt' => $time,
            'updatedAt' => $time
        ];

        $model = new Wallet();
        $form = $this->factory->create(WalletType::class, $model);

        $expected = new Wallet();
        $expected->setName('TestWallet');
        $expected->setBalance(2000);
        $expected->setCreatedAt($time);
        $expected->setUpdatedAt($time);

        $form->submit($formatData);
        $this->assertTrue($form->isSynchronized());

        $this->assertEquals($expected->getName(), $model->getName());
        $this->assertEquals($expected->getId(), $model->getId());
    }
}
