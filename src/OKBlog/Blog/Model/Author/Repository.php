<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Author;

use OKBlog\Blog\Model\Author\Entity;

class Repository
{
    private \DI\FactoryInterface $factory;

    /**
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(\DI\FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return Entity[]
     */
    public function getAuthorList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setAuthorId(1)
                ->setName('Vadim Kolesnik'),
            2 => $this->makeEntity()
                ->setAuthorId(2)
                ->setName('Iryna Tkachuk'),
            3 => $this->makeEntity()
                ->setPostId(3)
                ->setName('Valentyna Sirenko')
        ];
    }

    /**
     * @param int $authorId
     * @return Entity
     */
    public function getAuthorById(int $authorId): Entity
    {
        $authors = $this->getAuthorList();

        $data = array_filter(
            $authors,
            static function ($author) use ($authorId) {
                return $author->getAuthorId() === $authorId;
            }
        );

        return array_pop($data);
    }


    /**
     * @return Entity
     * @throws \DI\DependencyException
     * @throws \DI\NotFoundException
     */
    private function makeEntity(): Entity
    {
        return $this->factory->make(Entity::class);
    }

}