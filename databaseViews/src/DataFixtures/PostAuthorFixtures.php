<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostAuthorFixtures extends Fixture
{
    use FixturesTrait;

    public function load(ObjectManager $manager)
    {
        $authors = $this->authorRepository->findAll();
        foreach ($authors as $author) {
            for ($j = 1; $j <= 50; $j++) {
                $post = new Post();
                $post->setTitle($author->getName() . ' post nr' . $j);
                $post->setContent($this->fakerFactory->text);
                $post->setAuthor($author);
                $manager->persist($post);
            }
            $manager->flush();
        }
    }
}
