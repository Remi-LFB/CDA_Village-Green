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
    }
}
