<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoFinanzas extends Model
{
    protected $table = 'activos_finanzas';

    protected $fillable = [
        'activo_id', 
    ];

    // Relación con la tabla "activos"
    public function activo()
    {
        return $this->belongsTo(Activo::class, 'activo_id');
    }
}