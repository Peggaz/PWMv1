<?php
/**
 * User fixtures.
 */

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;

/**
 * Class UserFixtures.
 */
class UserFixtures extends AbstractBaseFixtures
{

    /**
     * UserFixtures constructor.
     *
     */
    public function __construct(){
    }

    /**
     * Load data.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        $this->createMany(10, 'users', function ($i) {
            $user = new User();
            $user->setEmail(sprintf('user%d@example.com', $i));
            $user->setRoles([User::ROLE_USER]);
            $user->setPassword(
        'user1234'
            );

            return $user;
        });

        $this->createMany(3, 'admins', function ($i) {
            $user = new User();
            $user->setEmail(sprintf('admin%d@example.com', $i));
            $user->setRoles([User::ROLE_USER, User::ROLE_ADMIN]);
            $user->setPassword(
                    'admin1234'
            );

            return $user;
        });

        $manager->flush();
    }
}
