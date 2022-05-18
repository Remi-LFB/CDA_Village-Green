<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = new CategoryFixtures();
        $subCategories = new SubCategoryFixtures();
        $suppliers = new SupplierFixtures();

        $categories->load($manager);
        $manager->flush();

        $subCategories->load($manager);
        $manager->flush();

        $suppliers->load($manager);
        $manager->flush();
    }
}
