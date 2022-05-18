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
        $categoryGuitars = $manager->getRepository(Category::class)->findOneBy(['name' => 'Guitares']);
        $categoryAccessories = $manager->getRepository(Category::class)->findOneBy(['name' => 'Accessoires']);
        
        $subCategory1 = new SubCategory();
        $subCategory2 = new SubCategory();
        $subCategory3 = new SubCategory();
        $subCategory4 = new SubCategory();

        $subCategory1->setName('Acoustiques');
        $subCategory1->setCategory($categoryGuitars);
        $manager->persist($subCategory1);

        $subCategory2->setName('Électriques');
        $subCategory2->setCategory($categoryGuitars);
        $manager->persist($subCategory2);

        $subCategory3->setName('Basses');
        $subCategory3->setCategory($categoryGuitars);
        $manager->persist($subCategory3);

        $subCategory4->setName('Amplis');
        $subCategory4->setCategory($categoryAccessories);
        $manager->persist($subCategory4);
    }
}
