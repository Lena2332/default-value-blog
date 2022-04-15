<?php

declare(strict_types=1);

namespace OKBlog\Framework\Http;

use OKBlog\Framework\Http\ControllerInterface;
use OKBlog\Framework\Http\RouterInterface;

class RequestDispatcher
{
    /**
     * @var RouterInterface[] $routers
     */
    private array $routers;

    private \OKBlog\Framework\Http\Request $request;

    private \DI\FactoryInterface $factory;

    /**
     * @param array $routers
     * @param Request $request
     * @param \DI\FactoryInterface $factory
     */
    public function __construct(
        array $routers,
        \OKBlog\Framework\Http\Request $request,
        \DI\FactoryInterface $factory
    ) {
        foreach ($routers as $router) {
            if (!($router instanceof RouterInterface)) {
                throw new \InvalidArgumentException('Routers must implement ' . RouterInterface::class);
            }
        }

        $this->routers = $routers;
        $this->request = $request;
        $this->factory = $factory;
    }

    public function dispatch()
    {
        $requestUrl = $this->request->getRequestUrl();

        foreach ($this->routers as $router) {
            if ($controllerClass = $router->match($requestUrl)) {

                $controller = $this->factory->get($controllerClass);

                if (!($controller instanceof ControllerInterface)) {
                    throw new \InvalidArgumentException(
                        "Controller $controller must implement " . ControllerInterface::class
                    );
                }

                $response = $controller->execute();
            }
        }

        if (!isset($response)) {
            $response = $this->factory->make(NotFound::class);
        }

        $response->send();
    }


}