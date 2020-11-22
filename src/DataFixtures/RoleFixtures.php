<?php

namespace App\DataFixtures;

use App\Entity\Role;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RoleFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach (['manager', "employe"] as $role){
            $roleEntity = new Role();
            $manager->persist($roleEntity->setNom($role));
        }

        $manager->flush();
    }
}
