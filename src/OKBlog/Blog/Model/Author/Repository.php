<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Author;

class Repository extends \OKBlog\Framework\Database\AbstractRepository
{
    public const TABLE = 'author';

    public const ENTITY = Entity::class;

    /**
     * @param int $authorId
     * @return Entity|null|object
     */
    public function getAuthorById(int $authorId): ?Entity
    {
        return $this->fetchOne(
            $this->select()->where('author_id = :author_id'),
            [
                ':author_id' => $authorId
            ]
        );
    }

    /**
     * @param string $url
     * @return Entity|null|object
     */
    public function getAuthorByUrl(string $url): ?Entity
    {
        return $this->fetchOne(
            $this->select()->where('url = :url'),
            [
                ':url' => $url
            ]
        );
    }


    /**
     * @param array $authorIdArr
     * @return Entity[]|null
     */
    public function getAuthorByIdArr(array $authorIdArr): ?array
    {
        $select = $this->select()
            ->where('author_id IN ('.implode(',',$authorIdArr).')');

        return $this->fetchEntities($select);
    }
}