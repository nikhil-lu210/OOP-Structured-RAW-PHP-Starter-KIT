<?php
namespace App\Models\Post;

use App\Models\Website\Website;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model {
    protected $table = 'posts';

    public function website(): BelongsTo 
    {
        return $this->belongsTo(Website::class);
    }
}