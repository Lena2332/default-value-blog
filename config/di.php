<?php

declare(strict_types=1);

return [
   \OKBlog\Framework\Http\RequestDispatcher::class => \DI\autowire()->constructorParameter(
       'routers',
       [
           \DI\get(\OKBlog\Cms\Router::class),
           \DI\get(\OKBlog\Blog\Router::class),
           \DI\get(\OKBlog\ContactUs\Router::class),
       ]
   )
];
