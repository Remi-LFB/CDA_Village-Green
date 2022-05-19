<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\SubCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $subCategoryAcoustiques = $manager->getRepository(SubCategory::class)->findOneBy(['name' => 'Acoustiques']);
        $subCategoryElectriques = $manager->getRepository(SubCategory::class)->findOneBy(['name' => 'Électriques']);
        $subCategoryBasses = $manager->getRepository(subCategory::class)->findOneBy(['name' => 'Basses']);
        $subCategoryAmplis = $manager->getRepository(subCategory::class)->findOneBy(['name' => 'Amplis']);

        $product1 = new Product();


    }
}
