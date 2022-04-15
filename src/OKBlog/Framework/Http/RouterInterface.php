<?php

namespace OKBlog\Framework\Http;

interface RouterInterface
{
    /*
     * @param string $requestUrl
     * @return string
     */
    public function match(string $requestUrl): string;
}