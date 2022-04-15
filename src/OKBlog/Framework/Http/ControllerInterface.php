<?php

namespace OKBlog\Framework\Http;

interface ControllerInterface
{
    public function execute(): string;
}