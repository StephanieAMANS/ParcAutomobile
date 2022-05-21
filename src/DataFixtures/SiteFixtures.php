<?php

namespace App\DataFixtures;

use App\Entity\Site;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SiteFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $site1 = new Site();
        $site1->setName('Bordeaux');
        $site1->setCode(33);

        $manager->persist($site1);

        $site2 = new Site();
        $site2->setName('Champs-sur-Marne');
        $site2->setCode(77);

        $manager->persist($site2);

        $manager->flush();
    }
}
