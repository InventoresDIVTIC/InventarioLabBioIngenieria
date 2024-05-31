<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiciosGastos extends Model
{
    protected $table = 'servicios_gastos';

    protected $fillable = [
        'services_id',
        'service_expense',
        'parts_expense'
    ];

    // Propiedades para almacenar valores originales
    protected $originalServiceExpense;
    protected $originalPartsExpense;

    public static function boot()
    {
        parent::boot();

        static::updating(function ($serviciosGastos) {
            // Guardar los valores originales antes de la actualización
            $serviciosGastos->originalServiceExpense = $serviciosGastos->getOriginal('service_expense');
            $serviciosGastos->originalPartsExpense = $serviciosGastos->getOriginal('parts_expense');
        });
    }

    // Métodos para obtener las diferencias de los gastos
    public function getServiceExpenseDifference()
    {
        return $this->service_expense - $this->originalServiceExpense;
    }

    public function getPartsExpenseDifference()
    {
        return $this->parts_expense - $this->originalPartsExpense;
    }

    // Relación con la tabla "activos"
    public function activo()
    {
        return $this->belongsTo(Activo::class, 'services_id');
    }
}
