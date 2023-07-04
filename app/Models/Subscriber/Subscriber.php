<?php
namespace App\Models\Subscriber;

use App\Migrations\SubscriberTable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subscriber\Traits\SubscriberRelations;

class Subscriber extends Model {

    use SubscriberTable, SubscriberRelations;

    protected $table = 'subscribers';
}