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
                'name' => 'Guitares',
                'picture' => 'url'
            ],
            2 => [
                'name' => 'Batteries',
                'picture' => 'url'
            ],
            3 => [
                'name' => 'Pianos',
                'picture' => 'url'
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
