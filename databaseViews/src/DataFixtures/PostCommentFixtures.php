<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Comment;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PostCommentFixtures extends Fixture
{
    use FixturesTrait;

    public function load(ObjectManager $manager)
    {
        $posts = $this->postRepository->findAll();
        foreach ($posts as $post) {
            /*if ($post->getId() == 40) {
                return;
            }*/
            $randomValue = rand(1, 5);
            for ($i = 0; $i < $randomValue; $i++) {
                $comment = new Comment();
                $comment->setNickname($this->fakerFactory->name);
                $comment->setContent($this->fakerFactory->text);
                $comment->setPost($post);
                $manager->persist($comment);
            }
            $manager->flush();
        }
    }
}
