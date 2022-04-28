<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block;

use OKBlog\Blog\Model\Author\Entity as AuthorEntity;
use OKBlog\Blog\Model\Post\Entity as PostEntity;

class PageBlock extends \OKBlog\Framework\View\Block
{
    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Blog\Model\Post\Repository $postRepository;

    private \OKBlog\Blog\Model\Author\Repository $authorRepository;

    private array $latestPosts;

    private array $latestAuthors;

    protected string $template;

    public static int $quantity = 5;

    public static int $daysAgo = 10;

    /**
     * @param \OKBlog\Framework\Http\Request $request
     * @param \OKBlog\Blog\Model\Post\Repository $postRepository
     * @param \OKBlog\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request,
        \OKBlog\Blog\Model\Post\Repository $postRepository,
        \OKBlog\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
        $this->template = $this->getTemplate();
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        $page = $this->request->getParameter('page');
        return '../src/OKBlog/Cms/View/' . $page . '.php';
    }

    /**
     * @return PostEntity[]
     */
    public function getLatestPosts(): array
    {
        if (!isset($this->latestPosts)) {
            $this->latestPosts = $this->postRepository->getLatestPosts(self::$quantity, self::$daysAgo);
        }

        return $this->latestPosts;
    }

    /**
     * @param int $authorId
     * @return AuthorEntity
     */
    public function getAuthorById(int $authorId): AuthorEntity
    {
        $this->setLatestAuthors();

        if (!isset($this->latestAuthors[$authorId])) {
            // Protection from incorrect method usage in case somebody tries to pass wrong post ID
            throw new \InvalidArgumentException (
                "Author #$authorId does not belong to latest list"
            );
        }

        return $this->latestAuthors[$authorId];
    }

    /**
     * @return void
     */
    private function setLatestAuthors(): void
    {
        if (!isset($this->latestAuthors)) {
            // Get author IDs for the next query
            $authorIdArr = array_map(function ($post) {
                return $post->getAuthorId();
            }, $this->getLatestPosts());

            // Remove authorId = 0 (when post has not author) and remove dublicates
            $authorIdArr = array_diff(array_unique($authorIdArr), array(0));

            foreach ($this->authorRepository->getAuthorByIdArr($authorIdArr) as $author) {
                $this->latestAuthors[$author->getAuthorId()] = $author;
            }
        }
    }
}