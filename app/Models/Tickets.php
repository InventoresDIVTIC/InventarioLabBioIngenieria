<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'tickets';

    protected $fillable = [
        'active_id',
        'request',
        'type_request',
        'priority',
        'status',
    ];

}