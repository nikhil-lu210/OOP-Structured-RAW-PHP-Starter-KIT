<?php
namespace App\Models\Website;

use App\Models\Post\Post;
use App\Models\Subscriber\Subscriber;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Website extends Model {
    protected $table = 'websites';

    public function subscribers(): HasMany 
    {
        return $this->hasMany(Subscriber::class);
    }

    public function posts(): HasMany 
    {
        return $this->hasMany(Post::class);
    }
}