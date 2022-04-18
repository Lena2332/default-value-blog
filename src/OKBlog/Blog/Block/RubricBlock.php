<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block;

use OKBlog\Blog\Model\Author\Entity as AuthorEntity;
use OKBlog\Blog\Model\Rubric\Entity as RubricEntity;
use OKBlog\Blog\Model\Post\Entity as PostEntity;

class RubricBlock extends \OKBlog\Framework\View\Block
{
    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Blog\Model\Post\Repository $postRepository;

    private \OKBlog\Blog\Model\Author\Repository $authorRepository;

    protected string $template = '../src/OKBlog/Blog/View/rubric.php';

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
    }

    /**
     * @return RubricEntity
     */
    public function getRubric(): RubricEntity
    {
        return $this->request->getParameter('rubric');
    }

    /**
     * @return PostEntity[]
     */
    public function  getRubricPosts(): array
    {
       $rubricEntity = $this->getRubric();

       return $this->postRepository->getPostByIds($rubricEntity->getPosts());
    }

    /**
     * @param int $authorId
     * @return AuthorEntity
     */
    public function getAuthorById(int $authorId): AuthorEntity
    {
        return $this->authorRepository->getAuthorById($authorId);
    }
}