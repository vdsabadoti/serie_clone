<?php

namespace App\DataFixtures;

use App\Entity\Serie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class SerieFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 100; $i++) {
            $serie = new Serie();
            $serie->setName($faker->words(10, true))
                ->setOverview($faker->words(30, true))
                ->setGenres($faker->randomElement(['Sci-fi', 'Comedy', 'Thriller', 'Western', 'Drama']))
                ->setFirstAirDate($faker->dateTimeBetween(new \DateTime('-2 years'), new \DateTime()))
                ->setDateCreated(new \DateTime())
                ->setVote($faker->randomFloat(2, 0, 10))
                ->setStatus($faker->randomElement(['canceled', 'ended', 'filming']));

            if (\in_array($serie->getStatus(), ['canceled', 'ended'])){
                $serie->setLastAirDate($faker->dateTimeBetween($serie->getFirstAirDate(), new \DateTime('-1 days')));
            }

            $manager->persist($serie);
        }
        $manager->flush();
    }
}
