<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block;

use OKBlog\Blog\Model\Post\Entity as PostEntity;

class PageBlock extends \OKBlog\Framework\View\Block
{
    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Blog\Model\Post\Repository $postRepository;

    protected string $template;

    /**
     * @param \OKBlog\Framework\Http\Request $request
     * @param \OKBlog\Blog\Model\Post\Repository $postRepository
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request,
        \OKBlog\Blog\Model\Post\Repository $postRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
        $this->template = $this->getTemplate();
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        $page = $this->request->getParameter('page');
        $template = '../src/OKBlog/Cms/View/' . $page . '.php';
        return $template;
    }

    /**
     * @return PostEntity[]
     */
    public function getLatestPosts(int $quantity = 5, int $pastDays = 2): array
    {
        return $this->postRepository->getLatestPosts($quantity, $pastDays);
    }


}