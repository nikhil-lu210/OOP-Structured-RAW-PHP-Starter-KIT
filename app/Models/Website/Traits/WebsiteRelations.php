<?php
namespace App\Models\Website\Traits;

use App\Models\Post\Post;
use App\Models\Subscriber\Subscriber;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait WebsiteRelations
{

    public function subscribers(): HasMany 
    {
        return $this->hasMany(Subscriber::class);
    }

    public function posts(): HasMany 
    {
        return $this->hasMany(Post::class);
    }
}
