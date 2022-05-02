<?php

namespace App\DataFixtures;

use App\Entity\Book;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class BookFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $book = new Book();
        $book->setTitle('Infinite Jest');
        $book->setReleaseYear( 2005);
        $book->setDescription( 'Set in an addicts\' halfway house and a tennis academy, 
                and featuring the most endearingly screwed-up family to come along in recent fiction, 
                Infinite Jest explores essential questions about what entertainment is and why it has come to so dominate our lives; 
                about how our desire for entertainment affects our need to connect with other people; and about what the pleasures we 
                choose say about who we are.');
        $book->setImagePath('https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1446876799l/6759.jpg');
        $book->setAuthorId($this->getReference('author_1'));
        $manager->persist($book);

        $book2 = new Book();
        $book2->setTitle('Moby Dick or, The Whale');
        $book2->setReleaseYear( 1851);
        $book2->setDescription('So Melville wrote of his masterpiece, one of the greatest works of imagination in literary history. 
                In part, Moby-Dick is the story of an eerily compelling madman pursuing an unholy war against a creature as vast and dangerous 
                and unknowable as the sea itself. But more than just a novel of adventure, more than an encyclopaedia of whaling lore and legend, 
                the book can be seen as part of its author\'s lifelong meditation on America.');
        $book2->setImagePath('https://i.gr-assets.com/images/S/compressed.photo.goodreads.com/books/1327940656l/153747.jpg');
        $book2->setAuthorId($this->getReference('author_2'));
        $manager->persist($book2);
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            AuthorFixtures::class,
        ];
    }
}
