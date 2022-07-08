<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Command;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommandFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user1 = $manager->getRepository(User::class)->findOneBy(['reference' => 'USE2']);

        $commands = [
            1 => [
                'createdAt' => new \DateTime(),
                'payedAt' => new \DateTime(),
                'paymentMethod' => 'Carte bancaire',
                'address' => $user1->getAddress(),
                'zipcode' => $user1->getZipcode(),
                'city' => $user1->getCity(),
                'country' => $user1->getCountry(),
                'state' => 'Livré',
                'invoicedAt' => new \DateTime(),
                'user' => $user1
            ]
        ];

        foreach ($commands as $key => $value) {
            $command = new Command();

            $command
                ->setCreatedAt($value['createdAt'])
                ->setPayedAt($value['payedAt'])
                ->setPaymentMethod($value['paymentMethod'])
                ->setBillingAddress($value['address'])
                ->setBillingZipcode($value['zipcode'])
                ->setBillingCity($value['city'])
                ->setBillingCountry($value['country'])
                ->setDeliveryAddress($value['address'])
                ->setDeliveryZipcode($value['zipcode'])
                ->setDeliveryCity($value['city'])
                ->setDeliveryCountry($value['country'])
                ->setState($value['state'])
                ->setInvoicedAt($value['invoicedAt'])
                ->setUser($value['user']);

            $manager->persist($command);
        }
    }
}
