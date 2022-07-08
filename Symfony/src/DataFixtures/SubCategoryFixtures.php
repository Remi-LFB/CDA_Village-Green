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
        $category1 = $manager->getRepository(Category::class)->findOneBy(['name' => 'Guitares & Basses']);
        $category2 = $manager->getRepository(Category::class)->findOneBy(['name' => 'Batteries & Percussions']);
        $category3 = $manager->getRepository(Category::class)->findOneBy(['name' => 'Pianos & Claviers']);

        $subCategories = [
            1 => [
                'name' => 'Guitares classiques',
                'picture' => 'images/sub_categories/1.png',
                'category' => $category1
            ],
            2 => [
                'name' => 'Guitares électriques',
                'picture' => 'images/sub_categories/2.png',
                'category' => $category1
            ],
            3 => [
                'name' => 'Guitares basses',
                'picture' => 'images/sub_categories/3.png',
                'category' => $category1
            ],
            4 => [
                'name' => 'Batteries acoustiques',
                'picture' => 'images/sub_categories/4.png',
                'category' => $category2
            ],
            5 => [
                'name' => 'Batteries électroniques',
                'picture' => 'images/sub_categories/5.png',
                'category' => $category2
            ],
            6 => [
                'name' => 'Synthétiseurs',
                'picture' => 'images/sub_categories/6.png',
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
