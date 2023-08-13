<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiciosFirmas extends Model
{
    protected $table = 'servicios_firmas';

    protected $fillable = [
        'services_id', 
    ];

    // Relación con la tabla "activos"
    public function activo()
    {
        return $this->belongsTo(Activo::class, 'services_id');
    }
}