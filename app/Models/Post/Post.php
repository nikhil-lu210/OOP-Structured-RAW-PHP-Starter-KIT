<?php
namespace App\Models\Post;

use App\Migrations\PostTable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post\Traits\PostRelations;

class Post extends Model {
    use PostTable, PostRelations;

    protected $table = 'posts';
}