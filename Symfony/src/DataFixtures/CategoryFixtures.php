<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = new Category();
        $category2 = new Category();

        $category1->setName('Guitares');
        $manager->persist($category1);

        $category2->setName('Accessoires');
        $manager->persist($category2);
    }
}
;