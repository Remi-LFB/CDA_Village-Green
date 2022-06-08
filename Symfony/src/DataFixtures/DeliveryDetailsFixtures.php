<?php

namespace App\DataFixtures;

use App\Entity\Delivery;
use App\Entity\DeliveryDetails;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DeliveryDetailsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $delivery1 = $manager->getRepository(Delivery::class)->findOneBy(['id' => 1]);
        $product1 = $manager->getRepository(Product::class)->findOneBy(['reference' => 'GIT002']);

        $deliveriesDetails = [
            1 => [
                'deliveryId' => $delivery1,
                'productId' => $product1,
                'quantity' => 2
            ]
        ];

        foreach ($deliveriesDetails as $key => $value) {
            $deliveryDetails = new DeliveryDetails();

            $deliveryDetails
                ->setDelivery($value['deliveryId'])
                ->setProduct($value['productId'])
                ->setQuantity($value['quantity']);

            $manager->persist($deliveryDetails);
        }
    }
}
