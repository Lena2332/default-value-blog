<?php
declare(strict_types=1);

$requestUri = trim($_SERVER['REQUEST_URI'], '/');

echo "Hello new project! Page: ".$requestUri;
