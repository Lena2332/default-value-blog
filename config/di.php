<?php

declare(strict_types=1);

use OKBlog\Framework\Database\Adapter\MySql;

return [
    \OKBlog\Framework\Database\Adapter\AdapterInterface::class => DI\get(
        MySql::class
    ),
    MySql::class => DI\autowire()->constructorParameter(
        'connectionParams',
        [
            MySql::DB_NAME     => 'olena_kupriiets_blog',
            MySql::DB_USER     => 'olena_kupriiets_blog_user',
            MySql::DB_PASSWORD => '5707stkom@32021tT',
            MySql::DB_HOST     => 'mysql',
            MySql::DB_PORT     => '3306'
        ]
    ),
   \OKBlog\Framework\Http\RequestDispatcher::class => \DI\autowire()->constructorParameter(
       'routers',
       [
           \DI\get(\OKBlog\Cms\Router::class),
           \DI\get(\OKBlog\Blog\Router::class),
           \DI\get(\OKBlog\ContactUs\Router::class),
           \DI\get(\OKBlog\Install\Router::class),
       ]
   )
];
