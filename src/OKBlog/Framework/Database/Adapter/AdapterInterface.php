<?php

declare(strict_types=1);

namespace OKBlog\Framework\Database\Adapter;

interface AdapterInterface
{
    public function getConnection();
}