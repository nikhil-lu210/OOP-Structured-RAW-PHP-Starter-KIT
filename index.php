<?php

use Dotenv\Dotenv;
use App\Services\Route;

if (!isset($_SESSION)) {
    session_start();
}

require_once(__DIR__ . '/vendor/autoload.php');

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

spl_autoload_register(function ($class) {
    $classFile = str_replace("\\", DIRECTORY_SEPARATOR, $class) . '.php';
    $classPath = __DIR__ . '/app/' . $classFile;

    if (file_exists($classPath)) {
        require_once($classPath);
    }
});

$route = new Route();
require_once(__DIR__ . '/routes/web.php');
$route->handle();