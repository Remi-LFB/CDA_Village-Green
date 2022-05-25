<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $name = "category{$i}";
            $$name = new Category();
        }

        $category1
            ->setName('Guitares')
            ->setPicture('url');

        $category2
            ->setName('Batteries')
            ->setPicture('url');

        $category3
            ->setName('Pianos')
            ->setPicture('url');

        for ($i = 1; $i <= 3; $i++) {
            $name = "category{$i}";

            $manager->persist($$name);
        }
    }
}
