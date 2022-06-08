<?php

namespace App\DataFixtures;

use App\Entity\Command;
use App\Entity\Delivery;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DeliveryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $command1 = $manager->getRepository(Command::class)->findOneBy(['id' => 1]);

        $deliveries = [
            1 => [
                'createdAt' => new \DateTime(),
                'commandId' => $command1
            ]
        ];

        foreach ($deliveries as $key => $value) {
            $delivery = new Delivery();

            $delivery
                ->setCreatedAt($value['createdAt'])
                ->setCommand($value['commandId']);

            $manager->persist($delivery);
        }
    }
}
