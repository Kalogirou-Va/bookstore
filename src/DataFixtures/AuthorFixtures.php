<?php

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use ReflectionClass;

class AuthorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $author = new Author();
        $author->setName('David Foster Wallace');
        $dob = new \DateTime('1962-02-21');
        $author->setDob($dob);
        $dod = new \DateTime('2008-09-12');
        $author->setDod($dod);
        $author->setOrigin('Ithaca, New York, The United States ');
        $author->setBiography('David Foster Wallace worked surprising turns on nearly everything: novels, 
            journalism, vacation. His life was an information hunt, collecting hows and whys. "I received 500,000 discrete bits of 
            information today," he once said, "of which maybe 25 are important. My job is to make some sense of it." He wanted to write 
            "stuff about what it feels like to live. Instead of being a relief from what it feels like to live." Readers curled up in the nooks 
            and clearings of his style: his comedy, his brilliance, his humaneness.');
        $author->setImagePath('https://images.gr-assets.com/authors/1615507112p5/4339.jpg');
        
        $manager->persist($author);

        $author2 = new Author();
        $author2->setName('Herman Melville');
        $dob2 = new \DateTime('1819-08-01');
        $author2->setDob($dob2);
        $dod2 = new \DateTime('1891-09-28');
        $author2->setDod($dod2);
        $author2->setOrigin('New York City, New York, The United States ');
        $author2->setBiography('Herman Melville was an American novelist, short story writer, essayist, and poet. His first two books gained much attention, 
            though they were not bestsellers, and his popularity declined precipitously only a few years later. By the time of his death he 
            had been almost completely forgotten, but his longest novel, Moby Dick — largely considered a failure during his lifetime, and most 
            responsible for Melville\'s fall from favor with the reading public — was rediscovered in the 20th century 
            as one of the chief literary masterpieces of both American and world literature.');
        $author2->setImagePath('https://images.gr-assets.com/authors/1495029910p5/1624.jpg');
        
        $manager->persist($author2);
        
        $manager->flush();

        $this->addReference('author_1', $author);
        $this->addReference('author_2', $author2);
    }
}
