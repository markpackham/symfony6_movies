<?php

namespace App\DataFixtures;

use App\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $movie = new Movie();
        $movie->setTitle('The Dark Knight');
        $movie->setReleaseYear(2008);
        $movie->setDescription('Dark Knight description...');
        $movie->setImagePath('https://cdn.pixabay.com/photo/2021/06/18/11/22/batman-6345897_960_720.jpg');

        // Add data to pivot table
        $movie->addActor($this->getReference('actor_0'));
        $movie->addActor($this->getReference('actor_1'));

        $manager->persist($movie);


        $movie2 = new Movie();
        $movie2->setTitle('Captain America');
        $movie2->setReleaseYear(2011);
        $movie2->setDescription('Captain America description...');
        $movie2->setImagePath('https://pixabay.com/illustrations/captain-america-avengers-marvel-5692937/');

        $movie2->addActor($this->getReference('actor_2'));
        $movie2->addActor($this->getReference('actor_3'));

        $manager->persist($movie2);


        $manager->flush();
    }
}
