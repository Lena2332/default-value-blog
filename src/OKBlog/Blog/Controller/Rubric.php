<?php

declare(strict_types=1);

namespace OKBlog\Blog\Controller;

use OKBlog\Framework\Http\Response\Raw;

class Rubric implements \OKBlog\Framework\Http\ControllerInterface
{
    private  \OKBlog\Framework\View\PageResponse $pageResponse;

    /**
     * @param \OKBlog\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \OKBlog\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        return $this->pageResponse->setBody(\OKBlog\Blog\Block\RubricBlock::class);
    }
}