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

    protected string $template;

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
    public function getLatestPosts(int $quantity = 5, int $pastDays = 2): array
    {
        return $this->postRepository->getLatestPosts($quantity, $pastDays);
    }

    /**
     * @param int $authorId
     * @return AuthorEntity|null
     */
    public function getAuthorById(int $authorId): ?AuthorEntity
    {
       return $this->authorRepository->getAuthorById($authorId);
    }
}