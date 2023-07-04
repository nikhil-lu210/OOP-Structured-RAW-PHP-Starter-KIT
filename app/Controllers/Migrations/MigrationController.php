<?php
namespace App\Controllers\Migrations;

use App\Models\Post\Post;
use App\Models\Website\Website;
use App\Models\Subscriber\Subscriber;

class MigrationController {
    public function create() {
        Website::createTable();
        Subscriber::createTable();
        Post::createTable();

        dd('Migration Created');
    }
}