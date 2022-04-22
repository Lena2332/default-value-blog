<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Post;

class Entity
{
    private int $postId;

    private string $url;

    private string $name;

    private string $img;

    private string $introText;

    private string $text;

    private int $authorId;

    private string $createdAt;

    private string $updatedAt;

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return $this
     */
    public function setPostId(int $postId): Entity
    {
        $this->postId = $postId;

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
    public function getImg(): string
    {
        return $this->img;
    }

    /**
     * @param string $img
     * @return $this
     */
    public function setImg(string $img): Entity
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return string
     */
    public function getIntroText(): string
    {
        return $this->introText;
    }

    /**
     * @param string $introText
     * @return $this
     */
    public function setIntroText(string $introText): Entity
    {
        $this->introText = $introText;

        return $this;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return $this
     */
    public function setText(string $text): Entity
    {
        $this->text = $text;

        return $this;
    }

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

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt(string $updatedAt): Entity
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
