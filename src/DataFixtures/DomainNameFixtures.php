<?php

namespace App\DataFixtures;

use App\Entity\DomainName;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DomainNameFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 1; $i <= 3; $i++){
            $domainName = new DomainName();
            $domainName->setName("avaelys" . $i . "fr");
            $domainName->setHost("nerim");
            $domainName->setCreationDate(new \DateTime('2022-10-09'));
//          $domainName->addUser();
            $manager->persist($domainName);
//            $this->addReference("domainName$i", $domainName);
        }
        $manager->flush();
    }
}
