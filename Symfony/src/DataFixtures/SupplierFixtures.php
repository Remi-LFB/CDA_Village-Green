<?php

namespace App\DataFixtures;

use App\Entity\Supplier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SupplierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 2; $i++) {
            $name = "supplier{$i}";
            $$name = new Supplier();
        }

        $supplier1
            ->setName('Ibanez')
            ->setType('Constructeur')
            ->setContact('Ibah Neise')
            ->setMail('ibah.neise@ibanez.com')
            ->setPhone('0102030405')
            ->setAddress('42 Avenue du Sushi')
            ->setZipcode('08501')
            ->setCity('Nagoya')
            ->setCountry('Japon');

        $supplier2
            ->setName('Algam')
            ->setType('Importateur')
            ->setContact('Hall Gamme')
            ->setMail('hall.gamme@algam.fr')
            ->setPhone('0203040506')
            ->setAddress('24 Rue de la musique')
            ->setZipcode('80000')
            ->setCity('Amiens')
            ->setCountry('France');

        for ($i = 1; $i <= 2; $i++) {
            $name = "supplier{$i}";

            $manager->persist($$name);
        }
    }
}
