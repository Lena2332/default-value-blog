<?php
declare(strict_types=1);

$requestUri = trim($_SERVER['REQUEST_URI'], '/');

echo "Hello new project! Page: ".$requestUri;

header('Content-Type: text/html; charset=utf-8');

ob_start();
require_once "../src/template.php";
echo ob_get_clean();