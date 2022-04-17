<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block;

use OKBlog\Blog\Model\Post\Entity as PostEntity;
use OKBlog\Blog\Model\Author\Entity as AuthorEntity;

class PostBlock extends \OKBlog\Framework\View\Block
{
    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/OKBlog/Blog/View/post.php';

    /**
     * @param \OKBlog\Framework\Http\Request $request
     * @param \OKBlog\Blog\Model\Author\Repository $authorRepository
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request,
        \OKBlog\Blog\Model\Author\Repository $authorRepository
    ) {
        $this->request = $request;
        $this->authorRepository = $authorRepository;
    }

    /**
     * @return PostEntity
     */
    public function getPost(): PostEntity
    {
        return $this->request->getParameter('post');
    }


    /**
     * @return AuthorEntity|null
     */
    public function getAuthor(): ?AuthorEntity
    {
        $authorId = $this->getPost()->getAuthorId();

        return $this->authorRepository->getAuthorById($authorId);
    }


}