<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Author;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AuthorFixtures extends Fixture
{
    use FixturesTrait;

    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 100; $i++) {
            $author = new Author();
            $author->setName($this->fakerFactory->firstName. ' '.$this->fakerFactory->lastName);
            $author->setDescription($this->fakerFactory->text());
            $manager->persist($author);
        }
        $manager->flush();
    }
}
