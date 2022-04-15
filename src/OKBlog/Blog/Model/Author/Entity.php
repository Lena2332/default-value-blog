<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Author;

class Entity
{
    private int $authorId;

    private string $name;

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     */
    public function setAuthorId(int $authorId): void
    {
        $this->authorId = $authorId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): Entity
    {
        $this->name = $name;

        return $this;
    }

}