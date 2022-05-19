<?php

namespace App\DataFixtures;

use App\Entity\Supplier;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SupplierFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $supplier1 = new Supplier();
        $supplier2 = new Supplier();

        $supplier1->setName('Ibanez');
        $supplier1->setType('Constructeur');
        $supplier1->setContact('Hoshino Gakki Ten');
        $supplier1->setMail('hoshinogakkiten@ibanez.com');
        $supplier1->setPhone('0102030405');
        $supplier1->setAddress('2 Chome-1-33 Kanda Surugadai');
        $supplier1->setZipcode('10062');
        $supplier1->setCity('Chiyoda City');
        $supplier1->setCountry('Japon');
        $manager->persist($supplier1);

        $supplier2->setName('Guitars & Tools');
        $supplier2->setType('Importateur');
        $supplier2->setContact('Robert Lafarce');
        $supplier2->setMail('robert.lafarce@gnt.fr');
        $supplier2->setPhone('0203040506');
        $supplier2->setAddress('42b Avenue de la Sainte-Guitare');
        $supplier2->setZipcode('80000');
        $supplier2->setCity('Amiens');
        $supplier2->setCountry('France');
        $manager->persist($supplier2);
    }
}
