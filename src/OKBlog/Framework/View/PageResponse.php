<?php

declare(strict_types=1);

namespace OKBlog\Blog\Framework\View;

use OKBlog\Blog\Framework\Http\Response\Html;

class PageResponse extends Html
{
    private Renderer $renderer;

    public function __construct(
        \OKBlog\Blog\Framework\View\Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlocClass
     * @param string $template
     * @return PageResponse
     */
    public function setBody(string $contentBlocClass, string $template = ''): PageResponse
    {
        return parent::setBody((string) $this->renderer->setContent($contentBlocClass, $template));
    }

}