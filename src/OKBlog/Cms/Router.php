<?php

declare(strict_types=1);

namespace OKBlog\Cms;

use OKBlog\Cms\Controller\Page;

class Router implements \OKBlog\Framework\Http\RouterInterface
{
    private $request;

    public function __construct(
        \OKBlog\Framework\Http\Request $request
    ){
        $this->request = $request;
    }

    public function match(string $requestUrl): string
    {
        $cmsPage = [
            '',
            'test-page',
            'test-page-2'
        ];

        if (in_array($requestUrl, $cmsPage)) {
            $this->request->setParameter('page', $requestUrl ?: 'home');

            return Page::class;
        }

        return '';
    }
}