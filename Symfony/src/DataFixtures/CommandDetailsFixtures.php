<?php

namespace App\DataFixtures;

use App\Entity\Command;
use App\Entity\CommandDetails;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommandDetailsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $command1 = $manager->getRepository(Command::class)->findOneBy(['id' => 1]);
        $product1 = $manager->getRepository(Product::class)->findOneBy(['reference' => 'GIT002']);

        $commandsDetails = [
            1 => [
                'commandId' => $command1,
                'productId' => $product1,
                'unitPrice' => 639,
                'quantity' => 2,
                'state' => 'Livrés'
            ]
        ];

        foreach ($commandsDetails as $key => $value) {
            $commandDetails = new CommandDetails();

            $commandDetails
                ->setCommand($value['commandId'])
                ->setProduct($value['productId'])
                ->setUnitPrice($value['unitPrice'])
                ->setQuantity($value['quantity'])
                ->setState($value['state']);

            $manager->persist($commandDetails);
        }
    }
}
