<?php

declare(strict_types=1);

namespace OKBlog\Blog\Controller;

use OKBlog\Framework\Http\Response\Raw;

class Post implements \OKBlog\Framework\Http\ControllerInterface
{
    private  \OKBlog\Framework\View\PageResponse $pageResponse;

    public function __construct(
        \OKBlog\Framework\View\PageResponse $pageResponse
    ) {
        $this->pageResponse = $pageResponse;
    }

    public function execute(): Raw
    {
        return $this->pageResponse->setBody(\OKBlog\Blog\Block\PostBlock::class);
    }
}