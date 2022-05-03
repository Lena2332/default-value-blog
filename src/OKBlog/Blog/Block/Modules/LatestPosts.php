<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block\Modules;

use OKBlog\Blog\Model\Post\Entity as PostEntity;
use OKBlog\Blog\Traits\GetAuthor;
use OKBlog\Framework\View\Block;

class LatestPosts extends Block
{
    private array $latestPosts;

    private \OKBlog\Blog\Model\Post\Repository $postRepository;

    protected string $template = '../src/OKBlog/Blog/View/Modules/latest_posts.php';

    public static int $quantity = 14;

    public static int $daysAgo = 14;

    use GetAuthor;

    /**
     * @param \OKBlog\Blog\Model\Post\Repository $postRepository
     * @param \OKBlog\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \OKBlog\Blog\Model\Post\Repository $postRepository,
        \OKBlog\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->postRepository = $postRepository;
        $this->setAuthorRepository($authorRepository);
    }

    /**
     * @return PostEntity[]
     */
    public function getPosts(): array
    {
        if (!isset($this->latestPosts)) {
            $this->latestPosts = $this->postRepository->getLatestPosts(self::$quantity, self::$daysAgo);
        }

        return $this->latestPosts;
    }

}