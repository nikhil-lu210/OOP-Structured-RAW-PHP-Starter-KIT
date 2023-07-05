<?php

use App\Services\Route;
use Jenssegers\Blade\Blade;

/**
 * Debugging function for displaying variable values and terminating the script execution.
 *
 * @param mixed $var The variable to be dumped.
 * @return void
 */
function diedump($var): void {
    $json = json_encode($var, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);

    echo '<pre style="display: block; background: #F5F5F5; padding: 10px; font-family: consolas, monospace; font-size: 16px; color: #333; overflow: auto; word-wrap: normal; white-space: pre; border-radius: 5px;">';
    echo '<code style="display: block; white-space: pre; overflow-x: auto; padding: 10px; margin: 0; border: 1px solid #efefef;">' . htmlspecialchars($json, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '</code>';
    echo '</pre>';

    die();
}



/**
 * Get the URI associated with the given route name.
 *
 * @param  string  $name  The name of the route.
 * @return string|null  The URI of the route if found, or null if not found.
 */
function route(string $name): ?string
{
    foreach (Route::getRoutes() as $route) {
        if (isset($route['name']) && $route['name'] === $name) {
            return $route['uri'];
        }
    }
    
    // If no route with the given name is found, return null or handle the error as needed
    return null;
}




/**
 * Render a Blade template and output the result.
 *
 * @param string $path The path to the Blade template file.
 * @param array $data The data to pass to the template (optional).
 * @return void
 */
function view(string $path, array $data = []): void {
    // Define the path to the views directory and the cache directory
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';

    $blade = new Blade($view, $cache);

    echo $blade->make($path, $data)->render();
}


/**
 * Render a Blade template and output the result.
 *
 * @param string $path The path to the Blade template file.
 * @param array $data The data to pass to the template (optional).
 * @return string
 */
function mail_view(string $path, array $data = []): string {
    // Define the path to the views directory and the cache directory
    $view = __DIR__ . '/../../resources/views';
    $cache = __DIR__ . '/../../bootstrap/cache';

    $blade = new Blade($view, $cache);

    return $blade->make($path, $data)->render();
}

/**
 * Redirect the user back to the previous page.
 *
 * @return void
 */
function redirect_back(): void
{
    Route::redirectBack();
}

/**
 * Redirect the user to a named route.
 *
 * @param string $route_name The name of the route to redirect to.
 * @return void
 */
function redirect_route(string $route_name): void
{
    Route::redirectRoute($route_name);
}




/**
 * Generate the URL for an asset file.
 *
 * @param string $path The relative path to the asset file
 * @return string The fully qualified URL to the asset
 */
function asset(string $path): string
{
    // Get the base URL dynamically based on the server environment
    $baseURL = '';
    if (isset($_SERVER['REQUEST_SCHEME'])) {
        $baseURL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'];
    } elseif (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
        $baseURL = 'https://' . $_SERVER['HTTP_HOST'];
    } else {
        $baseURL = 'http://' . $_SERVER['HTTP_HOST'];
    }

    // Specify the public folder name
    $publicFolder = 'public';

    // Construct the full URL by concatenating the base URL, public folder, and the asset path
    $assetURL = $baseURL . '/' . $publicFolder . '/' . $path;

    return $assetURL;
}