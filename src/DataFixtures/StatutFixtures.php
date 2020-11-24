<?php

namespace App\DataFixtures;

use App\Entity\Statut;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StatutFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        foreach (['Libre', "Occupé", "A nettoyer"] as $role) {
            $statutEntity = new Statut();
            $manager->persist($statutEntity->setNom($role));
        }
        $manager->flush();
    }
}
