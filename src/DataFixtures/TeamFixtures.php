<?php

namespace App\DataFixtures;

use App\Entity\Team;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TeamFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $team1 = new Team();
        $team1->setName('DSI');
        $team1->setCode('112');

        $manager->persist($team1);

        $team2 = new Team();
        $team2->setName('Services généraux FCBA');
        $team2->setCode('113');

        $manager->persist($team2);

        $team3 = new Team();
        $team3->setName('Services généraux BDX');
        $team3->setCode('114');

        $manager->persist($team3);

        $manager->flush();
    }
}
