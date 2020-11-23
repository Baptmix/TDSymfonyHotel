<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setEmail('root@toor.fr');
        $user->setPassword($this->passwordEncoder->encodePassword($user, 'root'));

        $manager->persist($user);
        $manager->flush();

        $user1 = new User();
        $user1->setEmail('manager@hotel.fr');
        $user1->setPassword($this->passwordEncoder->encodePassword($user1, 'manager'));

        $manager->persist($user);
        $manager->flush();
    }
}
