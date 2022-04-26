<?php


namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $user = new User();
            $user->setEmail($this->faker->email);
            $user->setPassword($this->faker->password);
            $user->setRole(
                (array)json_encode(
                    [
                        'France' => mt_rand(18, 80)
                    ]
                )
            );
            $manager->persist($user);
        }
        $manager->flush();
    }
}
