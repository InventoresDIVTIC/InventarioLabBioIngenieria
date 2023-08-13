<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoServicios extends Model
{
    protected $table = 'activos_servicios';

    protected $fillable = [
        'activo_id',
        'last_mprev',  
    ];

    // Relación con la tabla "activos"
    public function activo()
    {
        return $this->belongsTo(Activo::class, 'activo_id');
    }
}
