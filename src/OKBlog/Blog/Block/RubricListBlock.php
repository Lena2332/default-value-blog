<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block;

use OKBlog\Blog\Model\Rubric\Entity as RubricEntity;
use OKBlog\Blog\Model\Rubric\Repository as RubricRepository;

class RubricListBlock extends \OKBlog\Framework\View\Block
{
    protected string $template = '../src/OKBlog/Blog/View/rubric_list.php';

    private \OKBlog\Blog\Model\Rubric\Repository $rubricRepository;

    const LIMIT_RUBRIC = 5;

    /**
     * @param \OKBlog\Blog\Model\Rubric\Repository $rubricRepository
     */
    public function __construct(
        \OKBlog\Blog\Model\Rubric\Repository $rubricRepository
    ) {
        $this->rubricRepository = $rubricRepository;
    }

    /**
     * @return RubricEntity[]
     */
    public function getRubricList(): array
    {
       return array_slice($this->rubricRepository->getRubricList(),0, self::LIMIT_RUBRIC);
    }
}