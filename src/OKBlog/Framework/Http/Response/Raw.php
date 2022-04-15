<?php

declare(strict_types=1);

namespace OKBlog\Blog\Framework\Http\Response;

class Raw
{
    private array $headers = [];

    private string $body = '';

    /**
     * @return array
     */
    public function getHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param array $headers
     */
    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $body
     */
    public function setBody(string $body): void
    {
        $this->body = $body;
    }

    /**
     * @return void
     */
    public function send(): void
    {
        foreach ($this->getHeaders() as $header) {
            header($header);
        }

        echo $this->getBody();
    }

}