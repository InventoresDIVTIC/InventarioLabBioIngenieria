<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActivoFinanzas extends Model
{
    protected $table = 'activos_finanzas';

    protected $fillable = [
        'activo_id',
        'price',  // Asegúrate de incluir este campo en la lista de fillable
    ];

    // Propiedades para almacenar valores originales
    protected $originalPrice;

    public static function boot()
    {
        parent::boot();

        static::updating(function ($activoFinanzas) {
            // Guardar los valores originales antes de la actualización
            $activoFinanzas->originalPrice = $activoFinanzas->getOriginal('price');
        });
    }

    // Métodos para obtener la diferencia del precio
    public function getPriceDifference()
    {
        return $this->price - $this->originalPrice;
    }

    // Relación con la tabla "activos"
    public function activo()
    {
        return $this->belongsTo(Activo::class, 'activo_id');
    }
}
