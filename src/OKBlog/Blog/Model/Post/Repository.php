<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Post;

class Repository extends \OKBlog\Framework\Database\AbstractRepository
{
    public const TABLE = 'post';

    public const TABLE_RUBRIC_POST = 'rubric_post';

    public const ENTITY = Entity::class;

    /**
     * @param string $url
     * @return Entity|null|object
     */
    public function getPostByUrl(string $url): ?Entity
    {
        return $this->fetchOne(
            $this->select()->where('url = :url'),
            [
                ':url' => $url
            ]
        );
    }

    /**
     * @param int $quantity
     * @param int $pastDays
     * @return Entity[]|null
     */
    public function getLatestPosts(int $quantity, int $pastDays): ?array
    {
        $query = $this->select()
            ->where('DATEDIFF(CURDATE(), created_at) < :days')
            ->limit($quantity);

        return $this->fetchEntities(
            $query,
            [
                ':days' => $pastDays
            ]
        );
    }

    /**
     * @param int $rubricId
     * @return Entity[]|null
     */
    public function getPostsByRubricId(int $rubricId): ?array
    {
        $query = $this->select()
            ->innerJoin(self::TABLE_RUBRIC_POST, '', ' USING(`post_id`)')
            ->where('rubric_id = :rubric_id')
            ->limit(100);

        return $this->fetchEntities(
            $query,
            [
                ':rubric_id' => $rubricId
            ]
        );
    }

    /**
     * @param int $authorId
     * @return Entity[]|null
     */
    public function getPostsByAuthorId(int $authorId): ?array
    {
        $query = $this->select()
            ->where('author_id = :author_id')
            ->limit(100);

        return $this->fetchEntities(
            $query,
            [
                ':author_id' => $authorId
            ]
        );
    }
}