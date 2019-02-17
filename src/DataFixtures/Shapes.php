<?php

namespace App\DataFixtures;

use App\Entity\Shape;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Shapes extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $shape = new Shape('square');
        $manager->persist($shape);

        $shape = new Shape('rectangle');
        $manager->persist($shape);

        $shape = new Shape('circle');
        $manager->persist($shape);

        $manager->flush();
    }
}
