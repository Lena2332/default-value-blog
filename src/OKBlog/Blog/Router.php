<?php

declare(strict_types=1);

namespace OKBlog\Blog;

use OKBlog\Blog\Controller\Author;
use OKBlog\Blog\Controller\Post;
use OKBlog\Blog\Controller\Rubric;

class Router implements \OKBlog\Framework\Http\RouterInterface
{
    private $request;

    private $rubricRepository;

    private $postRepository;

    private $authorRepository;

    public function __construct(
        \OKBlog\Framework\Http\Request $request,
        \OKBlog\Blog\Model\Rubric\Repository $rubricRepository,
        \OKBlog\Blog\Model\Post\Repository $postRepository,
        \OKBlog\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->rubricRepository = $rubricRepository;
        $this->postRepository = $postRepository;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {

        if ($data = $this->rubricRepository->getRubricByUrl($requestUrl)) {
            $this->request->setParameter('rubric', $data);
            return Rubric::class;
        }

        if ($data = $this->postRepository->getPostByUrl($requestUrl)) {
            $this->request->setParameter('post', $data);
            return Post::class;
        }

        if ($data = $this->authorRepository->getAuthorByUrl($requestUrl)) {
            $this->request->setParameter('author', $data);
            return Author::class;
        }

        return '';

    }
}