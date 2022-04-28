<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Rubric;

class Repository extends \OKBlog\Framework\Database\AbstractRepository
{
    public const TABLE = 'rubric';

    public const ENTITY = Entity::class;

    public const TABLE_RUBRIC_POST = 'rubric_post';

    /**
     * @param string $url
     * @return Entity|null|object
     */
    public function getRubricByUrl(string $url): ?Entity
    {
        return $this->fetchOne(
            $this->select()->where('url = :url'),
            [
                ':url' => $url
            ]
        );
    }

    /**
     * @param int $postId
     * @return Entity|null|object
     */
    public function getRubricByPostId(int $postId): ?Entity
    {
        $query = $this->select()
            ->innerJoin(self::TABLE_RUBRIC_POST, '', ' USING(`rubric_id`)')
            ->where('post_id = :post_id');

        return $this->fetchOne(
            $query,
            [
                ':post_id' => $postId
            ]
        );
    }

    /**
     * @return Entity[]
     */
    public function getRubricList(): array
    {
        $select = $this->select()
            ->fields('DISTINCT (rubric.rubric_id)', true)
            ->fields('url')
            ->fields('name')
            ->innerJoin(self::TABLE_RUBRIC_POST, 'rp', 'ON rubric.rubric_id = rp.rubric_id');

        return $this->fetchEntities($select);
    }

    /**
     * @param array $postIds
     * @return Entity[]|null
     */
    public function getRubricsByPostIds(array $postIds): ?array
    {
        $select = $this->select()
            ->distinct(true)
            ->innerJoin(self::TABLE_RUBRIC_POST, 'rp', ' USING(`rubric_id`)')
            ->fields(self::TABLE . '.*', true)
            ->where('rp.post_id IN ('.implode(',',$postIds).')');

        return $this->fetchEntities($select);
    }
}