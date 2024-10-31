<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    protected $table = 'servicios';

    protected $fillable = [
        'foil',
        'user_name',
        'services_type',
        'status',
        'scheduled_date',
        'active_type',
        'active_model',
        'supplier_name',
        'assigned_engineer',
        'active_name',
        'active_model',
        'active_sublocation',
    ];


    // Relación con la tabla "Servicios_"
    public function detalles()
    {
        return $this->hasOne(Activo::class, 'id', 'active_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mostrarFormulario()
    {
        $proveedores = Proveedores::all(); // Obtén todos los proveedores de la tabla "proveedores"

        return view('nombre_de_la_vista', ['proveedores' => $proveedores]);
    }
}

