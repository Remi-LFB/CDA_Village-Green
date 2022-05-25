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

        for ($i = 1; $i <= 6; $i++) {
            $name = "product{$i}";
            $$name = new Product();
        }

        $product1
            ->setReference('GIT001')
            ->setLabel("Harley Benton ST-20HSS LH SBK")
            ->setOverview("
                Version gaucher\n
                Corps en tilleul\n
                Manche vissé en érable
            ")
            ->setDescription(" 
                Version gaucher\n
                Corps en tilleul\n
                Manche vissé en érable\n
                Touche en amarante\n
                Repères 'points'\n
                Profil du manche: Modern 'C'\n
                Rayon de la touche: 350 mm\n
                Diapason: 648 mm\n
                Largeur au sillet: 42 mm\n
                Barre de réglage (Truss Rod) double action\n
                22 frettes\n
                2 micros simple bobinage (manche et milieu)\n
                1 micro double bobinage (chevalet)\n
                1 réglage de volume\n
                2 réglages de tonalité\n
                Sélecteur 5 positions\n
                Vibrato synchronisé\n
                Mécaniques moulées sous pression\n
                Accastillage noir\n
                Tirant des cordes: .009 - .042\n
                Couleur: Satin Black
            ")
            ->setPrice(109)
            ->setStock(1)
            ->setState(true)
            ->setPicture('url')
            ->setCreatedAt(new \DateTime())
            ->setSupplier($supplier1)
            ->setSubCategory($subCategory2);

        $product2
            ->setReference('GIT002')
            ->setLabel("Cordoba GK Studio Negra Lefthand")
            ->setOverview("
                Version gaucher\n
                Electro-acoustique\n
                Pan coupé
            ")
            ->setDescription("
                Version gaucher\n
                Electro-acoustique\n
                Pan coupé\n
                Table en épicéa européen massif\n
                Fond et éclisses en placage de palissandre\n
                Touche en palissandre\n
                Diapason: 650 mm\n
                Largeur au sillet: 50 mm\n
                Mécaniques dorées\n
                Micro Fishman\n
                Couleur: Naturel
            ")
            ->setPrice(639)
            ->setStock(4)
            ->setState(true)
            ->setPicture('url')
            ->setCreatedAt(new \DateTime())
            ->setSupplier($supplier1)
            ->setSubCategory($subCategory1);

        $product3
            ->setReference('GIT003')
            ->setLabel("ESP LTD Phoenix-1004 Deluxe 4 BK")
            ->setOverview("
                4 cordes\n
                Corps en acajou\n
                Manche traversant en acajou/noyer
            ")
            ->setDescription("
                4 cordes\n
                Corps en acajou\n
                Manche traversant en acajou/noyer\n
                Profil du manche: U mince\n
                Touche en ébène\n
                Repères 'drapeaux' ESP\n
                Diapason: 864 mm (34'')\n
                Rayon de la touche: 400 mm (15,75'')\n
                Largeur au sillet: 40 mm (1,57'')\n
                21 frettes Extra Jumbo en acier inoxydable\n
                1 micro EMG 35J (chevalet)\n
                1 micro EMG 35P4 (manche)\n
                2 réglages de volume\n
                1 réglage de tonalité\n
                Chevalet Gotoh 201B-4\n
                Mécaniques LTD Vintage\n
                Accastillage noir\n
                Cordes D'Addario XL165 (.045/.065/.085/.105)\n
                Couleur: Noir
            ")
            ->setPrice(1199)
            ->setStock(0)
            ->setState(false)
            ->setPicture('url')
            ->setCreatedAt(new \DateTime())
            ->setSupplier($supplier1)
            ->setSubCategory($subCategory3);

        $product4
            ->setReference('BAT001')
            ->setLabel("Millenium MPS-850 E-Drum Set")
            ->setOverview("
                550 sons\n
                30 kits prédéfinis\n
                20 kits utilisateur
            ")
            ->setDescription("
                550 sons\n
                30 kits prédéfinis\n
                20 kits utilisateur\n
                100 morceaux\n
                2 morceaux utilisateur\n
                Enregistrement rapide\n
                Métronome\n
                EQ par kit\n
                Pitch\n
                Réverbération\n
                Compresseur\n
                6 faders pour ajuster le volume individuel des pads, du métronome et des chansons\n
                2 sorties Main sur Jack 6,3 mm\n
                Sortie casque sur Jack stéréo 6,3 mm\n
                Entrée ligne sur mini Jack stéréo 3,5 mm\n
                2 entrées Trigger sur Jack stéréo 6,3 mm (déjà occupées par le deuxième pad Crash et le quatrième pad de tom)\n
                USB MIDI\n
                Mémoire USB\n
                MIDI In & Out\n
                Import de sample WAV
            ")
            ->setPrice(648)
            ->setStock(4)
            ->setState(true)
            ->setPicture('url')
            ->setCreatedAt(new \DateTime())
            ->setSupplier($supplier2)
            ->setSubCategory($subCategory5);

        $product5
            ->setReference('BAT002')
            ->setLabel("Startone Star Drum Set Studio Bundle BK")
            ->setOverview("
                Batterie complète pour débutant\n
                Grosse caisse 20''x14''\n
                Tom 10''x08''
            ")
            ->setDescription("
                Batterie complète pour débutant\n
                Grosse caisse 20''x14''\n
                Tom 10''x08''\n
                Tom 12''x09''\n
                Stand tom 14''x14''\n
                Caisse claire en bois 14''x5,5''\n
                Fûts en peuplier\n
                Grosse caisse 9 plis\n
                Toms/stand tom 6 plis\n
                Finition: Rhodoïd\n
                Couleur: Noir
            ")
            ->setPrice(309)
            ->setStock(8)
            ->setState(true)
            ->setPicture('url')
            ->setCreatedAt(new \DateTime())
            ->setSupplier($supplier2)
            ->setSubCategory($subCategory4);

        $product6
            ->setReference('PIA001')
            ->setLabel("Moog Grandmother")
            ->setOverview("
                32 touches\n
                Clavier Fatar\n
                Mémorise jusqu'à 3 séquences avec jusqu'à 256 notes
            ")
            ->setDescription("
                32 touches\n
                Clavier Fatar\n
                Mémorise jusqu'à 3 séquences avec jusqu'à 256 notes\n
                Arpégiateur\n
                Réverbération à ressort intégrée basée sur le Moog 905 (également utilisable pour les signaux externes)\n
                2 oscillateurs analogiques avec forme d'onde sélectionnable et Hard Sync\n
                Filtre Ladder classique 4 pôles 10 Hz - 20 kHz\n
                Filtre passe-haut 1 pôle pouvant être patché\n
                Générateur d'enveloppe analogique ADSR\n
                Atténuateur bipolaire pouvant être patché\n
                Compatible avec les modèles Mother-32, DFAM et autres systèmes modulaires\n
                Molettes de Pitch et de modulation\n
                41 points de patch avec 21 entrées, 16 sorties et 4 Jacks câblés en parallèle\n
                1 entrée ligne sur Jack asymétrique 6,3 mm\n
                1 sortie combinée ligne/casque sur Jack 6,3 mm\n
                MIDI In/Out/Thru\n
                Port USB\n
                Dimensions: 580 x 362 x 139 mm\n
                Poids: 7,25 kg\n
                Bloc d'alimentation 12 V incl.\n
                Flight case adapté optionnel non-fourni (N° d'article 496295 ou 512190)
            ")
            ->setPrice(879)
            ->setStock(6)
            ->setState(true)
            ->setPicture('url')
            ->setCreatedAt(new \DateTime())
            ->setSupplier($supplier2)
            ->setSubCategory($subCategory6);

        for ($i = 1; $i <= 6; $i++) {
            $name = "product{$i}";

            $manager->persist($$name);
        }
    }
}
