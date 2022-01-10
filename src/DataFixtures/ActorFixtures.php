<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $actor0 = new Actor();
        $actor0->setName('Christian Bale');
        $manager->persist($actor0);

        $actor1 = new Actor();
        $actor1->setName('Health Ledger');
        $manager->persist($actor1);

        $actor2 = new Actor();
        $actor2->setName('Chris Evans');
        $manager->persist($actor2);

        $actor3 = new Actor();
        $actor3->setName('Robert Downey Jr');
        $manager->persist($actor3);

        $manager->flush();

        $this->addReference('actor_0', $actor0);
        $this->addReference('actor_1', $actor1);
        $this->addReference('actor_2', $actor2);
        $this->addReference('actor_3', $actor3);
    }
}
