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

    private ?array $rubricPosts;

    private array $rubricAuthors;

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
    public function  getRubricPosts(): ?array
    {
       if (!isset($this->rubricPosts)) {
           $rubricEntity = $this->getRubric();
           $this->rubricPosts = $this->postRepository->getPostsByRubricId($rubricEntity->getRubricId());
       }

       return $this->rubricPosts;
    }

    /**
     * @param int $authorId
     * @return AuthorEntity
     */
    public function getAuthorById(int $authorId): AuthorEntity
    {
        $this->setRubricAuthors();

        if (!isset($this->rubricAuthors[$authorId])) {
            // Protection from incorrect method usage in case somebody tries to pass wrong post ID
            throw new \InvalidArgumentException (
                "Author #$authorId does not belong to rubric #{$this->getRubric()->getRubricId()}"
            );
        }

        return $this->rubricAuthors[$authorId];
    }

    /**
     * @return void
     */
    private function setRubricAuthors(): void
    {
        if (!isset($this->rubricAuthors)) {
            // Get author IDs for the next query
            $authorIdArr = array_map(function ($post) {
                return $post->getAuthorId();
            }, $this->getRubricPosts());

            // Remove authorId = 0 (when post has not author) and remove dublicates
            $authorIdArr = array_diff(array_unique($authorIdArr), array(0));

            foreach ($this->authorRepository->getAuthorByIdArr($authorIdArr) as $author) {
                $this->rubricAuthors[$author->getAuthorId()] = $author;
            }
        }
    }
}