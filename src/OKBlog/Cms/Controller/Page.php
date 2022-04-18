<?php

declare(strict_types=1);

namespace OKBlog\Cms\Controller;

use OKBlog\Framework\Http\Response\Raw;
use OKBlog\Framework\View\Block;

class Page implements \OKBlog\Framework\Http\ControllerInterface
{
    private \OKBlog\Framework\Http\Request $request;

    private \OKBlog\Framework\View\PageResponse $pageResponse;

    /**
     * @param \OKBlog\Framework\Http\Request $request
     * @param \OKBlog\Framework\View\PageResponse $pageResponse
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request,
        \OKBlog\Framework\View\PageResponse $pageResponse
    ) {
        $this->request = $request;
        $this->pageResponse = $pageResponse;
    }

    /**
     * @return Raw
     */
    public function execute(): Raw
    {
        $data = $this->request->getParameter('page');
        $page = $data . '.php';

        return $this->pageResponse->setBody(\OKBlog\Blog\Block\PageBlock::class);
    }
}