<?php
namespace App\Models\Website;

use App\migrations\WebsiteTable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Website\Traits\WebsiteRelations;

class Website extends Model {
    use WebsiteTable, WebsiteRelations;

    protected $table = 'websites';
}