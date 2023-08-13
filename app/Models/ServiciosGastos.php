<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiciosGastos extends Model
{
    protected $table = 'servicios_gastos';

    protected $fillable = [
        'services_id', 
    ];

    // Relación con la tabla "activos"
    public function activo()
    {
        return $this->belongsTo(Activo::class, 'services_id');
    }
}