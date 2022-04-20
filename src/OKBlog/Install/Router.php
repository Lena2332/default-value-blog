<?php

declare(strict_types=1);

namespace OKBlog\Install;

use OKBlog\Install\Controller\Index;

class Router implements \OKBlog\Framework\Http\RouterInterface
{
    private \OKBlog\Framework\Http\Request $request;

    /**
     * @param \OKBlog\Framework\Http\Request $request
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request
    ) {
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($this->request->getRequestUrl() === 'install') {
            return Index::class;
        }

        return '';
    }
}