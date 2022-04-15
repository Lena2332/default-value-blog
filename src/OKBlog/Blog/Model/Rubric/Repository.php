<?php

declare(strict_types=1);

namespace OKBlog\Blog\Model\Rubric;

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
    public function getRubricList(): array
    {
        return [
            1 => $this->makeEntity()
                ->setRubricId(1)
                ->setName('Головні новини')
                ->setUrl('main')
                ->setPosts([1,3,7]),
            2 => $this->makeEntity()
                ->setRubricId(2)
                ->setName('Економіка')
                ->setUrl('economic')
                ->setPosts([2,5,8]),
            3 => $this->makeEntity()
                ->setRubricId(3)
                ->setName('Культура')
                ->setUrl('culture')
                ->setPosts([4,6,9]),
            4 => $this->makeEntity()
                ->setRubricId(4)
                ->setName('Інтерв\'ю')
                ->setUrl('interview')
                ->setPosts([10,11]),

        ];
    }

    /**
     * @param string $url
     * @return Entity|null
     */
    public function getRubricByUrl(string $url): ?Entity
    {
        $data = array_filter(
            $this->getRubricList(),
            static function ($rubric) use ($url) {
                return $rubric->getUrl() === $url;
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