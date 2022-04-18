<?php

declare(strict_types=1);

namespace OKBlog\Install\Controller;

use OKBlog\Framework\Http\Response\Html;

class Index implements \OKBlog\Framework\Http\ControllerInterface
{
    private \OKBlog\Framework\Database\Adapter\AdapterInterface $adapter;

    private \OKBlog\Framework\Http\Response\Html $html;

    /**
     * @param \OKBlog\Framework\Database\Adapter\AdapterInterface $adapter
     * @param \OKBlog\Framework\Http\Response\Html $html
     */
    public function __construct(
        \OKBlog\Framework\Database\Adapter\AdapterInterface $adapter,
        \OKBlog\Framework\Http\Response\Html $html
    ) {
        $this->adapter = $adapter;
        $this->html = $html;
    }

    /**
     * @return Html
     */
    public function execute(): Html
    {
        $connection = $this->adapter->getConnection();

        $this->html->setBody('Testing controller');

        return $this->html;
    }
}