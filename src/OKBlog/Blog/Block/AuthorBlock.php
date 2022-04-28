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

    private array $authorPosts;

    private array $authorRubrics;

    private array $rubricPost;

    const LIMIT_POST = 36;

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

        $this->authorPosts = array_slice($this->postRepository->getPostsByAuthorId($authorId), 0, self::LIMIT_POST);

        $this->setAllRubricsByPostArr();

        $this->setRubricIdPostId();

        return $this->authorPosts;
    }

    /**
     * @param int $postId
     * @return RubricEntity|null
     */
    public function getRubricByPostId(int $postId): ?RubricEntity
    {
        $rubricPost = array_column($this->rubricPost, 'rubric_id', 'post_id');

        if(isset($rubricPost[$postId])){
            $rubricId = (int) $rubricPost[$postId];

            $data = array_filter(
                $this->authorRubrics,
                static function ($rubric) use ($rubricId) {
                    return $rubric->getRubricId() === $rubricId;
                }
            );

            return array_pop($data);
        }

        return null;
    }

    /**
     * @return void
     */
    private function setAllRubricsByPostArr(): void
    {
        $this->authorRubrics = $this->rubricRepository->getRubricsByPostArr($this->getAuthorsPostIdArr());
    }

    /**
     * @return array
     */
    private function getAuthorsPostIdArr(): array
    {
        $postIdArr = array_map(function($post){
            return $post->getPostId();
        }, $this->authorPosts);

        return $postIdArr;
    }

    /**
     * @return void
     */
    private function setRubricIdPostId(): void
    {
        $this->rubricPost = $this->postRepository->getPostIdRubricId($this->getAuthorsPostIdArr());
    }
}