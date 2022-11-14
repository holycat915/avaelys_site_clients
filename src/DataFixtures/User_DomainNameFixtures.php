<?php

namespace App\DataFixtures;

use App\Entity\DomainName;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class User_DomainNameFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $domainNames = $manager->getRepository(DomainName::class)->findAll();
        $users = $manager->getRepository(User::class)->findAll();

        for ($i = 1; $i <=3; $i++){
            $user = $users[$i-1];
            $user->addDomainName($domainNames[mt_rand(0, count($domainNames) -1)]);
            $manager->persist($user);
        }
        $manager->flush();
    }

    public function getDependencies():array
    {
    return [DomainNameFixtures::class,UserFixtures::class];
    }
}
