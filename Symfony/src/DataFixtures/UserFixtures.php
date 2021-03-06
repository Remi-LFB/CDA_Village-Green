<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create('FR_fr');

        $users = [
            1 => [
                'reference' => 'USE1',
                'lastname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'birthAt' => new \DateTime($faker->date('Y-m-d', '2000-01-01')),
                'gender' => 'Masculin',
                'type' => 'Employé',
                'email' => 'admin@villagegreen.fr',
                'roles' => ['ROLE_ADMIN'],
                'password' => password_hash('admin', PASSWORD_DEFAULT),
                'phone' => '0304050607',
                'address' => $faker->address,
                'zipcode' => '80000',
                'city' => $faker->city,
                'country' => $faker->country,
                'createdAt' => new \DateTime(),
                'lastSeenAt' => new \DateTime()
            ],
            2 => [
                'reference' => 'USE2',
                'lastname' => $faker->lastName,
                'firstname' => $faker->firstName,
                'birthAt' => new \DateTime($faker->date()),
                'gender' => 'Féminin',
                'type' => 'Particulier',
                'email' => 'client.particulier@villagegreen.fr',
                'roles' => ['ROLE_USER'],
                'password' => password_hash('client.particulier', PASSWORD_DEFAULT),
                'phone' => '0405060708',
                'address' => $faker->address,
                'zipcode' => '59400',
                'city' => $faker->city,
                'country' => $faker->country,
                'createdAt' => new \DateTime(),
                'lastSeenAt' => new \DateTime()
            ]
        ];

        foreach ($users as $key => $value) {
            $user = new User();

            $user
                ->setReference($value['reference'])
                ->setLastname($value['lastname'])
                ->setFirstname($value['firstname'])
                ->setBirthAt($value['birthAt'])
                ->setGender($value['gender'])
                ->setType($value['type'])
                ->setEmail($value['email'])
                ->setPassword($value['password'])
                ->setPhone($value['phone'])
                ->setAddress($value['address'])
                ->setZipcode($value['zipcode'])
                ->setCity($value['city'])
                ->setCountry($value['country'])
                ->setCreatedAt($value['createdAt'])
                ->setLastSeenAt($value['lastSeenAt'])
                ->setRoles($value['roles']);

            $manager->persist($user);
        }
    }
}
