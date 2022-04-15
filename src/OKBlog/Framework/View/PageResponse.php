<?php

declare(strict_types=1);

namespace OKBlog\Framework\View;

use OKBlog\Framework\Http\Response\Html;

class PageResponse extends Html
{
    private Renderer $renderer;

    public function __construct(
        \OKBlog\Framework\View\Renderer $renderer
    ) {
        $this->renderer = $renderer;
    }

    /**
     * @param string $contentBlocClass
     * @param string $template
     * @return PageResponse
     */
    public function setBody(string $contentBlockClass, string $template = ''): PageResponse
    {
        return parent::setBody((string) $this->renderer->setContent($contentBlockClass, $template));
    }

}