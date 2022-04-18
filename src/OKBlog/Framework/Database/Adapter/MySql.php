<?php

declare(strict_types=1);

namespace OKBlog\Framework\Database\Adapter;

class MySql implements AdapterInterface
{
    private array $connectionParams;

    public const DB_NAME = 'database';
    public const DB_USER = 'user';
    public const DB_PASSWORD = 'password';
    public const DB_HOST = 'host';
    public const DB_PORT = 'port';

    /**
     * @param array $connectionParams
     */
    public function __construct(
        array $connectionParams
    ) {
        $this->connectionParams = $connectionParams;
    }

    public function getConnection()
    {
        // TODO: Implement getConnection() method.
    }
}