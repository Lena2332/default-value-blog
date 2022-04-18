<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block;

use OKBlog\Blog\Model\Post\Entity as PostEntity;
use OKBlog\Blog\Model\Author\Entity as AuthorEntity;
use OKBlog\Blog\Model\Rubric\Entity as RubricEntity;

class AuthorBlock extends \OKBlog\Framework\View\Block
{
    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Blog\Model\Post\Repository $postRepository;

    private \OKBlog\Blog\Model\Rubric\Repository $rubricRepository;

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
     * @return PostEntity[]
     */
    public function getAuthorPosts(): array
    {
        $authorId = $this->getAuthor()->getAuthorId();

        $posts = $this->postRepository->getPostList();
        return array_filter(
            $posts,
            static function ($post) use ($authorId) {
                return $post->getAuthorId() === $authorId;
            }
        );

    }

    /**
     * @param int $postId
     * @return RubricEntity|null
     */
    public function getRubricByPostId(int $postId): ?RubricEntity
    {
        $rubrics = $this->rubricRepository->getRubricList();

        $data = array_filter(
            $rubrics,
            static function ($rubric) use ($postId) {
                return in_array($postId, $rubric->getPosts());
            }
        );

        return array_pop($data);
    }
}