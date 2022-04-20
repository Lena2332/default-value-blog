<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Author;

class Repository
{
    public const TABLE = 'author';

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
                ->setName('Vadim Kolesnik')
                ->setUrl('vadim-kolesnik'),
            2 => $this->makeEntity()
                ->setAuthorId(2)
                ->setName('Iryna Tkachuk')
                ->setUrl('iryna-tkachuk'),
            3 => $this->makeEntity()
                ->setAuthorId(3)
                ->setName('Valentyna Sirenko')
                ->setUrl('valentyna-sirenko')
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
     * @param string $url
     * @return \OKBlog\Blog\Model\Author\Entity|null
     */
    public function getAuthorByUrl(string $url): ?Entity
    {
        $authors = $this->getAuthorList();

        $data = array_filter(
            $authors,
            static function ($author) use ($url) {
                return $author->getUrl() === $url;
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