<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block;

use OKBlog\Blog\Model\Post\Entity as PostEntity;
use OKBlog\Blog\Model\Author\Entity as AuthorEntity;

class AuthorBlock extends \OKBlog\Framework\View\Block
{
    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Blog\Model\Post\Repository $postRepository;

    private \OKBlog\Blog\Model\Rubric\Repository $rubricRepository;

    private ?array $authorPosts;

    private array $rubricsByPostId;

    protected string $template = '../src/OKBlog/Blog/View/author.php';

    /**
     * @param \OKBlog\Framework\Http\Request $request
     * @param \OKBlog\Blog\Model\Post\Repository $postRepository
     * @param \OKBlog\Blog\Model\Rubric\Repository $rubricRepository
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request,
        \OKBlog\Blog\Model\Post\Repository $postRepository,
        \OKBlog\Blog\Model\Rubric\Repository $rubricRepository
    ) {
        $this->request = $request;
        $this->postRepository = $postRepository;
        $this->rubricRepository = $rubricRepository;
    }

    /**
     * @return AuthorEntity
     */
    public function getAuthor(): AuthorEntity
    {
        return $this->request->getParameter('author');
    }

    /**
     * @return PostEntity[]|null
     */
    public function getAuthorPosts(): ?array
    {
        if (!isset($this->authorPosts)) {
            $authorId = $this->getAuthor()->getAuthorId();
            $this->authorPosts = $this->postRepository->getPostsByAuthorId($authorId);
        }

        return $this->authorPosts;
    }

    /**
     * @param int $postId
     * @return string
     */
    public function getRubricsNameByPostId(int $postId): string
    {
        $this->setRubricsByPostId();

        if (!isset($this->rubricsByPostId[$postId])) {
            // Protection from incorrect method usage in case somebody tries to pass wrong post ID
            throw new \InvalidArgumentException (
                "Post #$postId does not belong to author #{$this->getAuthor()->getAuthorId()}"
            );
        }

        $rubricsNames = array_map(static function ($rubric) {
            return $rubric->getName();
        }, $this->rubricsByPostId[$postId]);

        // Can also return the entire array so that every Rubric has a link to its page
        return implode(', ', $rubricsNames);
    }

    /**
     * Set RubricEntity[] to each postId
     * @return void
     */
    private function setRubricsByPostId(): void
    {
        if (!isset($this->rubricsByPostId)) {
            // Get post IDs for the next query
            $authorPostIds = array_map(static function ($post) {
                return $post->getPostId();
            }, $this->getAuthorPosts());

            // Get All rubrics for the above posts
            $rubricsById = [];

            foreach ($this->rubricRepository->getRubricsByPostIds($authorPostIds) as $rubric) {
                $rubricsById[$rubric->getRubricId()] = $rubric;
            }

            // By default, every known post may be in 0 or more rubrics
            $rubricsByPostId = array_fill_keys($authorPostIds, []);

            // Get post to rubric relations, and combine this with port IDs
            foreach ($this->postRepository->getPostIdRubricId($authorPostIds) as $row) {
                $rubricsByPostId[$row['post_id']][] = $rubricsById[$row['rubric_id']];
            }

            $this->rubricsByPostId = $rubricsByPostId;
        }
    }
}