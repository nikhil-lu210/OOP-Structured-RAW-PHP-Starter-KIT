<?php

use Jenssegers\Blade\Blade;

/**
 * Retrieve the value of an environment variable.
 *
 * @param string $value The name of the environment variable.
 * @return string|null The value of the environment variable if found, or null if not found.
 */
function my_env(string $value): ?string {
    return $_ENV[$value] ?? null;
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
