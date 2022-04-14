<?php

declare(strict_types=1);

namespace OKBlog\Cms\Controller;

class Page implements \OKBlog\Framework\Http\ControllerInterface
{
    private $request;

    public function __construct(
        \OKBlog\Framework\Http\Request $request
    ){
        $this->request = $request;
    }

    public function execute(): string
    {
        $data = $this->request->getParameter('page');
        $page = $data . '.php';

        ob_start();
        require_once "../src/template.php";
        return ob_get_clean();
    }
}