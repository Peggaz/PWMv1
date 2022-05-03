<?php


namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Wallet;
use Doctrine\Persistence\ObjectManager;

class WalletFixtures extends AbstractBaseFixtures
{
    /**
     * Load data.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function loadData(ObjectManager $manager): void
    {
        for ($i = 0; $i < 10; ++$i) {
            $wallet = new Wallet();
            $manager->persist($wallet);
        }
        $manager->flush();
    }
}
