<?php

namespace App\DataFixtures;

use App\Entity\Supplier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SupplierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $suppliers = [
            1 => [
                'name' => 'Ibanez',
                'type' => 'Constructeur',
                'contact' => 'Ibah Neise',
                'mail' => 'ibah.neise@ibanez.com',
                'phone' => '0102030405',
                'address' => '42 Avenue du Sushi',
                'zipcode' => '08501',
                'city' => 'Nagoya',
                'country' => 'Japon'
            ],
            2 => [
                'name' => 'Algam',
                'type' => 'Importateur',
                'contact' => 'Hall Gamme',
                'mail' => 'hall.gamme@algam.fr',
                'phone' => '0203040506',
                'address' => '24 Rue de la musique',
                'zipcode' => '80000',
                'city' => 'Amiens',
                'country' => 'France'
            ]
        ];

        foreach ($suppliers as $key => $value) {
            $supplier = new Supplier();

            $supplier
                ->setName($value['name'])
                ->setType($value['type'])
                ->setContact($value['contact'])
                ->setMail($value['mail'])
                ->setPhone($value['phone'])
                ->setAddress($value['address'])
                ->setZipcode($value['zipcode'])
                ->setCity($value['city'])
                ->setCountry($value['country']);

            $manager->persist($supplier);
        }
    }
}
