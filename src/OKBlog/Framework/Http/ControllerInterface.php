<?php

namespace OKBlog\Framework\Http;

use OKBlog\Framework\Http\Response\Raw;

interface ControllerInterface
{
    public function execute(): Raw;
}