<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fixtures1 = new CategoryFixtures();
        $fixtures2 = new SubCategoryFixtures();
        $fixtures3 = new SupplierFixtures();
        $fixtures4 = new ProductFixtures();

        for ($i = 1; $i <= 4; $i++) {
            $name = "fixtures{$i}";
            $$name->load($manager);

            $manager->flush();
        }
    }
}
