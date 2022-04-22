<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Author;

class Entity
{
    private int $authorId;

    private string $name;

    private string $url;

    private string $createdAt;

    /**
     * @return int
     */
    public function getAuthorId(): int
    {
        return $this->authorId;
    }

    /**
     * @param int $authorId
     * @return $this
     */
    public function setAuthorId(int $authorId): Entity
    {
        $this->authorId = $authorId;

        return $this;
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

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): Entity
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return date("Y-m-d", strtotime($this->createdAt));
    }

    /**
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt(string $createdAt): Entity
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}