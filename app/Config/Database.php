<?php
namespace App\Config;

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Database\Capsule\Manager as DB;

class Database {
    public function __construct()
    {
        $database = new DB;

        $database->addConnection([
            'driver'    => env('DB_CONNECTION', 'mysql'),
            'host'      => env('DB_HOST', 'localhost'),
            'database'  => env('DB_DATABASE', 'database'),
            'username'  => env('DB_USERNAME', 'root'),
            'password'  => env('DB_PASSWORD', ''),
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);
        
        // Set the event dispatcher used by Eloquent models
        $database->setEventDispatcher(new Dispatcher(new Container));
        
        // Make this DB instance available globally via static methods
        $database->setAsGlobal();
        
        // Setup the Eloquent ORM
        $database->bootEloquent();
    }
}
