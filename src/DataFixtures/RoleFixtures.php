<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $roleEntityM = new Role();
        $roleEntityM->setNom("Manager");
        $manager->persist($roleEntityM);


        $roleEntityE = new Role();
        $roleEntityE->setNom("Employé");
        $manager->persist($roleEntityE);

        $manager->flush();
    }
}
