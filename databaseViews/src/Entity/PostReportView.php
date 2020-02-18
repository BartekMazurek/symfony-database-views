<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostReportViewRepository")
 * @ORM\Table(name="post_report_view")
 */
class PostReportView
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="integer")
     */
    private $postId;

    /**
     * @ORM\Column(type="string")
     */
    private $authorName;

    /**
     * @ORM\Column(type="string")
     */
    private $postTitle;

    /**
     * @ORM\Column(type="string")
     */
    private $postContent;

    /**
     * @ORM\Column(type="integer")
     */
    private $postCommentCount;

    public function getPostId(): int
    {
        return $this->postId;
    }

    public function getAuthorName(): string
    {
        return $this->authorName;
    }

    public function getPostTitle(): string
    {
        return $this->postTitle;
    }

    public function getPostContent(): string
    {
        return $this->postContent;
    }

    public function getPostCommentCount(): int
    {
        return $this->postCommentCount;
    }
}
