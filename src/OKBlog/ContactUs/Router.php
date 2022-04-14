<?php

declare(strict_types=1);

namespace OKBlog\ContactUs;

use OKBlog\ContactUs\Controller\Form;

class Router implements \OKBlog\Framework\Http\RouterInterface
{
    /**
     * @inheritDoc
     */
    public function match(string $requestUrl): string
    {
        if ($requestUrl === 'contact-us') {
            return Form::class;
        }

        return '';
    }
}