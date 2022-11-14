<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; $i++){
            $user = new user();
            $user->setEmail("email".$i."@bla.fr");
            $user->setPassword("1234");
            $user->setName("nom " . $i . "fr");
            $user->setFirstname("prénom " . $i . "fr");
//          $user->addUser();
            $manager->persist($user);
        }
        $manager->flush();
    }

//    public function getDependencies(): array
//    {
//        return [DomainNameFixtures::class];
//    }
}
