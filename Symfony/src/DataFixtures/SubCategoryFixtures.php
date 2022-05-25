<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\SubCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SubCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category1 = $manager->getRepository(Category::class)->findOneBy(['name' => 'Guitares']);
        $category2 = $manager->getRepository(Category::class)->findOneBy(['name' => 'Batteries']);
        $category3 = $manager->getRepository(Category::class)->findOneBy(['name' => 'Pianos']);

        for ($i = 1; $i <= 6; $i++) {
            $name = "subCategory{$i}";
            $$name = new SubCategory();
        }

        $subCategory1
            ->setName('Guitares classiques')
            ->setPicture('url')
            ->setCategory($category1);

        $subCategory2
            ->setName('Guitares électriques')
            ->setPicture('url')
            ->setCategory($category1);

        $subCategory3
            ->setName('Guitares basses')
            ->setPicture('url')
            ->setCategory($category1);

        $subCategory4
            ->setName('Batteries acoustiques')
            ->setPicture('url')
            ->setCategory($category2);

        $subCategory5
            ->setName('Batteries électroniques')
            ->setPicture('url')
            ->setCategory($category2);

        $subCategory6
            ->setName('Synthétiseurs')
            ->setPicture('url')
            ->setCategory($category3);

        for ($i = 1; $i <= 6; $i++) {
            $name = "subCategory{$i}";

            $manager->persist($$name);
        }
    }
}
