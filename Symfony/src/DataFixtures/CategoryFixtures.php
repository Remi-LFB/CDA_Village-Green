<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
            1 => [
                'name' => 'Guitares & Basses',
                'picture' => 'images/categories/1.png'
            ],
            2 => [
                'name' => 'Batteries & Percussions',
                'picture' => 'images/categories/2.png'
            ],
            3 => [
                'name' => 'Pianos & Claviers',
                'picture' => 'images/categories/3.png'
            ],
            4 => [
                'name' => 'Accessoires pour musiciens',
                'picture' => 'images/categories/4.png'
            ]
        ];

        foreach ($categories as $key => $value) {
            $categorie = new Category();

            $categorie
                ->setName($value['name'])
                ->setPicture($value['picture']);

            $manager->persist($categorie);
        }
    }
}
