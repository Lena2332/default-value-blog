<?php

declare(strict_types=1);

try {
    require_once __DIR__.'/../src/bootstrap.php';
    /** @var \DI\ContainerBuilder $container */
    /** @var \OKBlog\Framework\Http\RequestDispatcher $requestDispatcher */
    $requestDispatcher = $container->get(\OKBlog\Framework\Http\RequestDispatcher::class);
    $requestDispatcher->dispatch();
} catch (\Exception $e) {
    echo "{$e->getMessage()} in file {$e->getFile()} at line {$e->getLine()}";
    exit(1);
}
