<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Repository\AuthorRepository;
use App\Repository\PostRepository;
use Faker\Factory;

trait FixturesTrait
{
    private $fakerFactory;
    private $postRepository;
    private $authorRepository;

    public function __construct(AuthorRepository $authorRepository, PostRepository $postRepository)
    {
        $this->fakerFactory = Factory::create();
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
    }
}
