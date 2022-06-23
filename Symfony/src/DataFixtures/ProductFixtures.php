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
                'overview' => '- Version gaucher
                    - Corps en tilleul
                    - Manche vissé en érable',
                'description' => '- Version gaucher
                    - Corps en tilleul
                    - Manche vissé en érable
                    - Touche en amarante
                    - Repères "points"
                    - Profil du manche: Modern "C"
                    - Rayon de la touche: 350 mm
                    - Diapason: 648 mm
                    - Largeur au sillet: 42 mm
                    - Barre de réglage (Truss Rod) double action
                    - 22 frettes
                    - 2 micros simple bobinage (manche et milieu)
                    - 1 micro double bobinage (chevalet)
                    - 1 réglage de volume
                    - 2 réglages de tonalité
                    - Sélecteur 5 positions
                    - Vibrato synchronisé
                    - Mécaniques moulées sous pression
                    - Accastillage noir
                    - Tirant des cordes: .009 - .042
                    - Couleur: Satin Black',
                'price' => 109,
                'stock' => 1,
                'state' => true,
                'picture' => 'images/products/1.png',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier1,
                'subCategory' => $subCategory2
            ],
            2 => [
                'reference' => 'GIT002',
                'label' => 'Cordoba GK Studio Negra Lefthand',
                'overview' => '- Version gaucher
                    - Electro-acoustique
                    - Pan coupé',
                'description' => '- Version gaucher
                    - Electro-acoustique
                    - Pan coupé
                    - Table en épicéa européen massif
                    - Fond et éclisses en placage de palissandre
                    - Touche en palissandre
                    - Diapason: 650 mm
                    - Largeur au sillet: 50 mm
                    - Mécaniques dorées
                    - Micro Fishman
                    - Couleur: Naturel',
                'price' => 639,
                'stock' => 4,
                'state' => true,
                'picture' => 'images/products/2.png',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier1,
                'subCategory' => $subCategory1
            ],
            3 => [
                'reference' => 'GIT003',
                'label' => 'ESP LTD Phoenix-1004 Deluxe 4 BK',
                'overview' => '- 4 cordes
                    - Corps en acajou
                    - Manche traversant en acajou/noyer',
                'description' => '- 4 cordes
                    - Corps en acajou
                    - Manche traversant en acajou/noyer
                    - Profil du manche: U mince
                    - Touche en ébène
                    - Repères "drapeaux" ESP
                    - Diapason: 864 mm (34")
                    - Rayon de la touche: 400 mm (15,75")
                    - Largeur au sillet: 40 mm (1,57")
                    - 21 frettes Extra Jumbo en acier inoxydable
                    - 1 micro EMG 35J (chevalet)
                    - 1 micro EMG 35P4 (manche)
                    - 2 réglages de volume
                    - 1 réglage de tonalité
                    - Chevalet Gotoh 201B-4
                    - Mécaniques LTD Vintage
                    - Accastillage noir
                    - Cordes D\'Addario XL165 (.045/.065/.085/.105)
                    - Couleur: Noir',
                'price' => 1199,
                'stock' => 0,
                'state' => false,
                'picture' => 'images/products/3.png',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier1,
                'subCategory' => $subCategory3
            ],
            4 => [
                'reference' => 'BAT001',
                'label' => 'Millenium MPS-850 E-Drum Set',
                'overview' => '- 550 sons
                    - 30 kits prédéfinis
                    - 20 kits utilisateur',
                'description' => '- 550 sons
                    - 30 kits prédéfinis
                    - 20 kits utilisateur
                    - 100 morceaux
                    - 2 morceaux utilisateur
                    - Enregistrement rapide
                    - Métronome
                    - EQ par kit
                    - Pitch
                    - Réverbération
                    - Compresseur
                    - 6 faders pour ajuster le volume individuel des pads, du métronome et des chansons
                    - 2 sorties Main sur Jack 6,3 mm
                    - Sortie casque sur Jack stéréo 6,3 mm
                    - Entrée ligne sur mini Jack stéréo 3,5 mm
                    - 2 entrées Trigger sur Jack stéréo 6,3 mm (déjà occupées par le deuxième pad Crash et le quatrième pad de tom)
                    - USB MIDI
                    - Mémoire USB
                    - MIDI In & Out
                    - Import de sample WAV',
                'price' => 648,
                'stock' => 4,
                'state' => true,
                'picture' => 'images/products/4.png',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier2,
                'subCategory' => $subCategory5
            ],
            5 => [
                'reference' => 'BAT002',
                'label' => 'Startone Star Drum Set Studio Bundle BK',
                'overview' => '- Batterie complète pour débutant
                    - Grosse caisse 20"x14"
                    - Tom 10"x08"',
                'description' => '- Batterie complète pour débutant
                    - Grosse caisse 20"x14"
                    - Tom 10"x08"
                    - Tom 12"x09"
                    - Stand tom 14"x14"
                    - Caisse claire en bois 14"x5,5"
                    - Fûts en peuplier
                    - Grosse caisse 9 plis
                    - Toms/stand tom 6 plis
                    - Finition: Rhodoïd
                    - Couleur: Noir',
                'price' => 309,
                'stock' => 8,
                'state' => true,
                'picture' => 'images/products/5.png',
                'createdAt' => new \DateTime(),
                'supplier' => $supplier2,
                'subCategory' => $subCategory4
            ],
            6 => [
                'reference' => 'PIA001',
                'label' => 'Moog Grandmother',
                'overview' => '- 32 touches
                    - Clavier Fatar
                    - Mémorise jusqu\'à 3 séquences avec jusqu\'à 256 notes',
                'description' => '- 32 touches
                    - Clavier Fatar
                    - Mémorise jusqu\'à 3 séquences avec jusqu\'à 256 notes
                    - Arpégiateur
                    - Réverbération à ressort intégrée basée sur le Moog 905 (également utilisable pour les signaux externes)
                    - 2 oscillateurs analogiques avec forme d\'onde sélectionnable et Hard Sync
                    - Filtre Ladder classique 4 pôles 10 Hz - 20 kHz
                    - Filtre passe-haut 1 pôle pouvant être patché
                    - Générateur d\'enveloppe analogique ADSR
                    - Atténuateur bipolaire pouvant être patché
                    - Compatible avec les modèles Mother-32, DFAM et autres systèmes modulaires
                    - Molettes de Pitch et de modulation
                    - 41 points de patch avec 21 entrées, 16 sorties et 4 Jacks câblés en parallèle
                    - 1 entrée ligne sur Jack asymétrique 6,3 mm
                    - 1 sortie combinée ligne/casque sur Jack 6,3 mm
                    - MIDI In/Out/Thru
                    - Port USB
                    - Dimensions: 580 x 362 x 139 mm
                    - Poids: 7,25 kg
                    - Bloc d\'alimentation 12 V incl.
                    - Flight case adapté optionnel non-fourni (N° d\'article 496295 ou 512190)',
                'price' => 879,
                'stock' => 6,
                'state' => true,
                'picture' => 'images/products/6.png',
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
