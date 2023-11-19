<?php

namespace App\DataFixtures;

use App\Entity\Activite;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $this->loadActivite($manager);

        $manager->flush();
    }

    public function loadActivite(ObjectManager $manager)
    {
        // - Tableau des valeurs
        $activiteArray = ['Événements', 'Balades', 'Visites', 'Pique-nique', 'Restauration', 'Hébergement', 'Location', 'Groupe'];

        // - Boucle sur les activités
        foreach($activiteArray as $key => $acti) {
            $activite = new Activite();
            $activite->setLabel($acti);
            $manager->persist($activite);

            $this->addReference('activite' . $key + 1, $activite);
        }
    }
}