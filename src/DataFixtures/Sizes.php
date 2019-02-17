<?php

namespace App\DataFixtures;

use App\Entity\Size;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class Sizes extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $size = new Size('small');
        $manager->persist($size);

        $size = new Size('medium');
        $manager->persist($size);

        $size = new Size('large');
        $manager->persist($size);

        $manager->flush();
    }
}
