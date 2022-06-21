<?php

namespace App\Tests\Forms;

use App\Entity\Tag;
use App\Form\Type\TagType;
use DateTime;
use Symfony\Component\Form\Test\TypeTestCase;

class TagTypeTest extends TypeTestCase
{
    /**
     * @return void
     */
    public function testSubmitValidDate()
    {
        $time = new DateTime('now');
        $formatData = [
            'name' => 'TestTag',
            'createdAt' => $time,
            'updatedAt' => $time
        ];

        $model = new Tag();
        $form = $this->factory->create(TagType::class, $model);

        $expected = new Tag();
        $expected->setName('TestTag');
        $expected->setCreatedAt($time);
        $expected->setUpdatedAt($time);
        $form->submit($formatData);
        $this->assertTrue($form->isSynchronized());

        $this->assertEquals($expected->getName(), $model->getName());
        $this->assertEquals($expected->getId(), $model->getId());
    }

}
