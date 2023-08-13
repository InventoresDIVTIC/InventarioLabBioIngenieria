<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedores extends Model
{
    protected $table = 'proveedores';

    protected $fillable = [
        'category',
        'sub_category',
        'support_email',
        'business_email',
        'site_web',
        'phone',
        'country',
        'state',
        'city',
        'company_name',
    ];
}
