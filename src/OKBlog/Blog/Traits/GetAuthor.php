<?php

declare(strict_types=1);

namespace OKBlog\Blog\Traits;

use OKBlog\Blog\Model\Author\Entity as AuthorEntity;
use OKBlog\Blog\Model\Post\Entity as PostEntity;

trait GetAuthor
{
    private \OKBlog\Blog\Model\Author\Repository $authorRepository;

    private array $latestAuthors;

    /**
     * @return PostEntity[]
     */
    abstract function getPosts(): array;

    /**
     * @param \OKBlog\Blog\Model\Author\Repository $authorRepository
     * @return void
     */
    public function setAuthorRepository(\OKBlog\Blog\Model\Author\Repository $authorRepository): void
    {
        $this->authorRepository = $authorRepository;
    }

    /**
     * @param int $authorId
     * @return AuthorEntity
     */
    public function getAuthorById(int $authorId): AuthorEntity
    {
        $this->setLatestAuthors();

        if (!isset($this->latestAuthors[$authorId])) {
            // Protection from incorrect method usage in case somebody tries to pass wrong post ID
            throw new \InvalidArgumentException (
                "Author #$authorId does not belong to post list"
            );
        }

        return $this->latestAuthors[$authorId];
    }

    /**
     * @return void
     */
    private function setLatestAuthors(): void
    {
        if (!isset($this->latestAuthors)) {
            // Get author IDs for the next query
            $authorIdArr = array_map(function ($post) {
                return $post->getAuthorId();
            }, $this->getPosts());

            // Remove authorId = 0 (when post has not author) and remove dublicates
            $authorIdArr = array_diff(array_unique($authorIdArr), array(0));

            foreach ($this->authorRepository->getAuthorByIdArr($authorIdArr) as $author) {
                $this->latestAuthors[$author->getAuthorId()] = $author;
            }
        }
    }

}