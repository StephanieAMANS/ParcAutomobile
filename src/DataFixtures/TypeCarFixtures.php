<?php

namespace App\DataFixtures;

use App\Entity\TypeCar;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class TypeCarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $type1 = new TypeCar();
        $type1->setType('2 places');

        $manager->persist($type1);

        $type2 = new TypeCar();
        $type2->setType('5 places');

        $manager->persist($type2);

        $type3 = new TypeCar();
        $type3->setType('Break');

        $manager->persist($type3);

        $type4 = new TypeCar();
        $type4->setType('Utilitaire');

        $manager->persist($type4);

        $manager->flush();
    }
}
