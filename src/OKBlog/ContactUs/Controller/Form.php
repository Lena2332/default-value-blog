<?php

declare(strict_types=1);

namespace OKBlog\ContactUs\Controller;

class Form implements \OKBlog\Framework\Http\ControllerInterface
{
    public function execute(): string
    {
        $page = 'contact-us.php';

        ob_start();
        require_once "../src/template.php";
        return ob_get_clean();
    }
}