<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Rubric;

class Entity
{
    private int $rubricId;

    private string $url;

    private string $name;

    private array $posts;

    /**
     * @return int
     */
    public function getRubricId(): int
    {
        return $this->rubricId;
    }

    /**
     * @param int $rubricId
     * @return $this
     */
    public function setRubricId(int $rubricId): Entity
    {
        $this->rubricId = $rubricId;

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
     * @return Entity
     */
    public function setUrl(string $url): Entity
    {
        $this->url = $url;

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
     * @return array
     */
    public function getPosts(): array
    {
        return $this->posts;
    }

    /**
     * @param array $posts
     * @return $this
     */
    public function setPosts(array $posts): Entity
    {
        $this->posts = $posts;

        return $this;
    }

}

