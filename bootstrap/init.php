<?php

// Import necessary classes and dependencies
use App\Config\Database;
use Dotenv\Dotenv;
use App\Services\Route;

// Start the session if not already started
if (!isset($_SESSION)) {
    session_start();

    // Generate a CSRF token if it doesn't exist in the session
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
}

// Load the autoloader for Composer dependencies
require_once(__DIR__ . '/../vendor/autoload.php');

// Load environment variables from .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Register the autoloader to load class files dynamically
spl_autoload_register(function ($class) {
    // Convert namespace separators to directory separators
    $classFile = str_replace("\\", DIRECTORY_SEPARATOR, $class) . '.php';
    
    // Define the path to the class file
    $classPath = __DIR__ . '/../app/' . $classFile;

    // Require the class file if it exists
    if (file_exists($classPath)) {
        require_once($classPath);
    }
});

// Instantiate the Database class to initialize the database connection
new Database();

// Instantiate the Route class
$route = new Route();
