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

        $this->authorPosts = $this->postRepository->getPostsByAuthorId($authorId);

        $this->setAllRubricsByPostArr();

        $this->setRubricIdPostId();

        return $this->authorPosts;
    }

    /**
     * @param int $postId
     * @return RubricEntity[]
     */
    private function getRubricByPostId(int $postId): array
    {
        if (empty($this->rubricPost) || empty($this->authorRubrics)) {
            $this->getAuthorPosts();
        }

            return $this->rubricPost[$postId] ?? [];
    }

    /**
     * @param int $postId
     * @return string
     */
    public function getRubricsNameByPostId(int $postId): string
    {
        $rubricsArr = $this->getRubricByPostId($postId);

        if (!empty($rubricsArr)) {
           $rubricsNameArr = array_map(function ($rubric) {
               return $rubric->getName();
           }, $rubricsArr);

           return implode(', ', $rubricsNameArr);
        }

        return "";
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
        $postIdArr = array_map(function($post) {
            return $post->getPostId();
        }, $this->authorPosts);

        return $postIdArr;
    }

    /**
     * @return void
     */
    private function setRubricIdPostId(): void
    {
       $rubricIdPostIdArr = $this->postRepository->getPostIdRubricId($this->getAuthorsPostIdArr());

       foreach($rubricIdPostIdArr as $row) {

           $rubricId = (int) $row['rubric_id'];

           $data = array_filter(
               $this->authorRubrics,
               static function ($rubric) use ($rubricId) {
                   return $rubric->getRubricId() === $rubricId;
               }
           );

           $this->rubricPost[$row['post_id']][] = array_pop($data);
       }
    }
}