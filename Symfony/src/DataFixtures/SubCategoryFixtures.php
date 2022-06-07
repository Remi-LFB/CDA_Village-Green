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

        $subCategories = [
            1 => [
                'name' => 'Guitares classiques',
                'picture' => 'url',
                'category' => $category1
            ],
            2 => [
                'name' => 'Guitares électriques',
                'picture' => 'url',
                'category' => $category1
            ],
            3 => [
                'name' => 'Guitares basses',
                'picture' => 'url',
                'category' => $category1
            ],
            4 => [
                'name' => 'Batteries acoustiques',
                'picture' => 'url',
                'category' => $category2
            ],
            5 => [
                'name' => 'Batteries électroniques',
                'picture' => 'url',
                'category' => $category2
            ],
            6 => [
                'name' => 'Synthétiseurs',
                'picture' => 'url',
                'category' => $category3
            ]
        ];

        foreach ($subCategories as $key => $value) {
            $subCategory = new subCategory();

            $subCategory
                ->setName($value['name'])
                ->setPicture($value['picture'])
                ->setCategory($value['category']);

            $manager->persist($subCategory);
        }
    }
}
