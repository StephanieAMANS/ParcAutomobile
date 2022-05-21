<?php

namespace App\DataFixtures;

use App\Entity\Personel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PersonelFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
         $personel1 = new Personel();
         $personel1->setUsername('Amans');
         $personel1->setPassword('$2y$13$GUn3iyL3z.ruFMmyw8DHXOUmGQZiv3U5FfRQn/bdZFb9Ipzk.EOfW');
         $personel1->setRoles(['ROLE_USER']);
         $personel1->setFirstname('Stéphanie');
         $personel1->setEmail('Stephanie.AMANS@fcba.fr');
         $personel1->setEmployeeManager('Diego Moreno');
         $personel1->setMailEmployeeManager('diego.moreno@fcba.fr');
         $personel1->setMatricule('1218');
         $personel1->setPhone('0556436379');

         $manager->persist($personel1);

        $personel2 = new Personel();
        $personel2->setUsername('Marques');
        $personel2->setPassword('$2y$13$.BpAco4Xe5r8kTRUagIWV.mge0fheKOAwwR4Dw.doMZVBIxeC0wdi');
        $personel2->setRoles(['ROLE_ADMIN']);
        $personel2->setFirstname('José');
        $personel2->setEmail('Jose.MARQUES@fcba.fr');
        $personel2->setEmployeeManager('Cyrille Bevilacqua');
        $personel2->setMailEmployeeManager('Cyrille.BEVILACQUA@fcba.fr');
        $personel2->setMatricule('633');
        $personel2->setPhone('0556436369');
        $personel2->setPortable('0680254385');

        $manager->persist($personel2);

        $manager->flush();
    }
}
