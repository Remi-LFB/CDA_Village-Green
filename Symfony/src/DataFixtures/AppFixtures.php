<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $fixtures = [
            1 => [
                'name' => new CategoryFixtures()
            ],
            2 => [
                'name' => new SubCategoryFixtures()
            ],
            3 => [
                'name' => new SupplierFixtures()
            ],
            4 => [
                'name' => new ProductFixtures()
            ],
            5 => [
                'name' => new UserFixtures()
            ],
            6 => [
                'name' => new CommandFixtures()
            ]
        ];

        foreach ($fixtures as $key => $value) {
            $fixture = $value['name'];

            $fixture->load($manager);
            $manager->flush();
        }
    }
}
