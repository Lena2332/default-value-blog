<?php
declare(strict_types=1);

$requestUri = trim($_SERVER['REQUEST_URI'], '/');

require_once '../src/data.php';

switch ($requestUri) {
    case '':
        $page = 'home.php';
        break;
    case 'contact-us':
        $page = 'contact-us.php';
        break;
    default:
        if ($data = getRubricByUrl($requestUri)) {
            $page = 'rubric.php';
            break;
        }

        if ($data = getPostByUrl($requestUri)) {
            $page = 'post.php';
            break;
        }

        break;
}

if (!isset($page)) {
    header("HTTP/1.0 404 Not Found");
    exit(0);
}

header('Content-Type: text/html; charset=utf-8');

ob_start();
require_once "../src/template.php";
echo ob_get_clean();
