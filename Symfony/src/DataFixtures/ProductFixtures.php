<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\SubCategory;
use App\Entity\Supplier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $supplier1 = $manager->getRepository(Supplier::class)->findOneBy(['name' => 'Ibanez']);
        $supplier2 = $manager->getRepository(Supplier::class)->findOneBy(['name' => 'Algam']);

        $subCategory1 = $manager->getRepository(SubCategory::class)->findOneBy(['name' => 'Guitares classiques']);
        $subCategory2 = $manager->getRepository(SubCategory::class)->findOneBy(['name' => 'Guitares électriques']);
        $subCategory3 = $manager->getRepository(SubCategory::class)->findOneBy(['name' => 'Guitares basses']);
        $subCategory4 = $manager->getRepository(SubCategory::class)->findOneBy(['name' => 'Batteries acoustiques']);
        $subCategory5 = $manager->getRepository(SubCategory::class)->findOneBy(['name' => 'Batteries électroniques']);
        $subCategory6 = $manager->getRepository(SubCategory::class)->findOneBy(['name' => 'Synthétiseurs']);

        $products = [
            1 => [
                'reference' => 'GIT001',
                'label' => 'Harley Benton ST-20HSS LH SBK',
                'overview' => 'Corps en tilleul',
                'description' => 'Corps en tilleul, version gaucher avec manche vissé en érable.',
                'price' => 109,
                'stock' => 1,
                'state' => true,
                'picture' => 'url',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier1,
                'subCategory' => $subCategory2
            ],
            2 => [
                'reference' => 'GIT002',
                'label' => 'Cordoba GK Studio Negra Lefthand',
                'overview' => 'Électro-acoustique',
                'description' => 'Électro-acoustique, version gaucher avec pan coupé.',
                'price' => 639,
                'stock' => 4,
                'state' => true,
                'picture' => 'url',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier1,
                'subCategory' => $subCategory1
            ],
            3 => [
                'reference' => 'GIT003',
                'label' => 'ESP LTD Phoenix-1004 Deluxe 4 BK',
                'overview' => 'Corps en acajou',
                'description' => 'Corps en acajou, 4 cordes avec manche traversant en acajou/noyer.',
                'price' => 1199,
                'stock' => 0,
                'state' => false,
                'picture' => 'url',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier1,
                'subCategory' => $subCategory3
            ],
            4 => [
                'reference' => 'BAT001',
                'label' => 'Millenium MPS-850 E-Drum Set',
                'overview' => '550 sons',
                'description' => '550 sons, 30 kits prédéfinis et 20 kits utilisateurs.',
                'price' => 648,
                'stock' => 4,
                'state' => true,
                'picture' => 'url',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier2,
                'subCategory' => $subCategory5
            ],
            5 => [
                'reference' => 'BAT002',
                'label' => 'Startone Star Drum Set Studio Bundle BK',
                'overview' => 'Batterie complète pour débutant',
                'description' => 'Batterie complète pour débutant, grosse caisse 20"x14" de couleur noir',
                'price' => 309,
                'stock' => 8,
                'state' => true,
                'picture' => 'url',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier2,
                'subCategory' => $subCategory4
            ],
            6 => [
                'reference' => 'PIA001',
                'label' => 'Moog Grandmother',
                'overview' => 'Clavier Fatar',
                'description' => 'Clavier Fatar, 32 touches, mémorise jusqu\'à 256 notes.',
                'price' => 879,
                'stock' => 6,
                'state' => true,
                'picture' => 'url',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier2,
                'subCategory' => $subCategory6
            ]
        ];

        foreach ($products as $key => $value) {
            $product = new Product();

            $product
                ->setReference($value['reference'])
                ->setLabel($value['label'])
                ->setOverview($value['overview'])
                ->setDescription($value['description'])
                ->setPrice($value['price'])
                ->setStock($value['stock'])
                ->setState($value['state'])
                ->setPicture($value['picture'])
                ->setCreatedAt($value['createdAt'])
                ->setSupplier($value['supplier'])
                ->setSubCategory($value['subCategory']);

            $manager->persist($product);
        }
    }
}
