<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activo extends Model
{
    protected $table = 'activos';

    protected $fillable = [
        'category',
        'type',
        'brand',
        'model',
        'serial',
        'location',
        'sublocation',
        'status',
        'hierarchy',
        'class',
    ];

    // Relación con la tabla "activos_proveeduria"
    public function proveeduria()
    {
        return $this->hasOne(ActivoProveeduria::class, 'activo_id');
    }
}

