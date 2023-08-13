<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoProveeduria extends Model
{
    protected $table = 'activos_proveeduria';

    protected $fillable = [
        'belonging',
        'activo_id', 
    ];

    // Relación con la tabla "activos"
    public function activo()
    {
        return $this->belongsTo(Activo::class, 'activo_id');
    }
}
