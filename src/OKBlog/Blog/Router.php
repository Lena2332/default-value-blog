<?php

declare(strict_types=1);

namespace OKBlog\Blog;

use OKBlog\Blog\Controller\Post;
use OKBlog\Blog\Controller\Rubric;

class Router implements \OKBlog\Framework\Http\RouterInterface
{
    private $request;

    public function __construct(
        \OKBlog\Framework\Http\Request $request
    ){
        $this->request = $request;
    }

    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        require_once '../src/data.php';

        if($data = getRubricByUrl($requestUrl)){
            $this->request->setParameter('rubric', $data);
            return Rubric::class;
        }

        if($data = getPostByUrl($requestUrl)){
            $this->request->setParameter('post', $data);
            return Post::class;
        }

        return '';

    }

}