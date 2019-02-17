<?php

namespace App\DataFixtures;

use App\Entity\Color;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Colors extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $color = new Color('red');
        $manager->persist($color);

        $color = new Color('green');
        $manager->persist($color);

        $color = new Color('blue');
        $manager->persist($color);

        $color = new Color('yellow');
        $manager->persist($color);

        $manager->flush();
    }
}
