<?php
/**
 * Task fixtures.
 */

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Faker\Generator;

/**
 * Class TaskFixtures.
 */
class AuthorFixtures extends Fixture
{
    /**
     * Faker.
     */
    protected Generator $faker;

    /**
     * Persistence object manager.
     */
    protected ObjectManager $manager;

    /**
     * Load.
     *
     * @param ObjectManager $manager Persistence object manager
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create();

        for ($i = 0; $i < 10; ++$i) {
            $author = new Author();
            $author->setName($this->faker->sentence);
            $author->setSurname($this->faker->sentence);

            $manager->persist($author);
        }

        $manager->flush();
    }
}
