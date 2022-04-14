<?php

declare(strict_types=1);

namespace OKBlog\Blog\Controller;

class Post implements \OKBlog\Framework\Http\ControllerInterface
{
    private $request;

    public function __construct(
        \OKBlog\Framework\Http\Request $request
    ){
         $this->request = $request;
    }

    public function execute(): string
    {
        $data = $this->request->getParameter('post');
        $page = 'post.php';

        ob_start();
        require_once "../src/template.php";
        return ob_get_clean();
    }
}