<?php

declare(strict_types=1);

namespace OKBlog\Blog\Block;

class PageBlock extends \OKBlog\Framework\View\Block
{
    private \OKBlog\Framework\Http\Request $request;

    protected string $template;

    /**
     * @param \OKBlog\Framework\Http\Request $request
     */
    public function __construct(
        \OKBlog\Framework\Http\Request $request
    ) {
        $this->request = $request;
        $this->template = $this->getTemplate();
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        $page = $this->request->getParameter('page');
        return '../src/OKBlog/Cms/View/' . $page . '.php';
    }

}