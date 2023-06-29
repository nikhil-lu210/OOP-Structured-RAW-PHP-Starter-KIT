<?php

// Include the init.php file
require_once(__DIR__ . '/bootstrap/init.php');

// Include the route definitions
require_once(__DIR__ . '/routes/web.php');

// Handle the route
$route->handle();
