<?php
namespace App\Models\Subscriber;

use App\Models\Website\Website;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscriber extends Model {
    protected $table = 'subscribers';

    public function website(): BelongsTo 
    {
        return $this->belongsTo(Website::class);
    }
}