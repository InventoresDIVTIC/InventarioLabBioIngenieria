<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use App\Models\ActivoProveeduria;
use App\Models\ActivoFinanzas;
use App\Models\ActivoServicios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivesController extends Controller
{
    public function guardar(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $validatedData = $request->validate([
            'category' => 'required',
            'type' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'serial' => 'required',
            'location' => 'required',
            'sublocation' => 'required',
            'status' => 'required',
            'hierarchy' => 'required',
            'belonging' => 'required',
        ]);

        // Obtener el ID del usuario autenticado
        $user_id = Auth::id();

        // Crear un nuevo registro de Activo
        $activo = new Activo();
        $activo->user_id = $user_id;
        $activo->category = $validatedData['category'];
        $activo->type = $validatedData['type'];
        $activo->brand = $validatedData['brand'];
        $activo->model = $validatedData['model'];
        $activo->serial = $validatedData['serial'];
        $activo->location = $validatedData['location'];
        $activo->sublocation = $validatedData['sublocation'];
        $activo->status = $validatedData['status'];
        $activo->hierarchy = $validatedData['hierarchy'];

        // Guardar el Activo en la base de datos
        $activo->save();

        // Crear un nuevo registro de ActivoProveeduria relacionado
        $activoProveeduria = new ActivoProveeduria();
        $activoProveeduria->belonging = $validatedData['belonging'];
        $activoProveeduria->activo_id = $activo->id;

        // Guardar el ActivoProveeduria en la base de datos
        $activoProveeduria->save();

        // Crear un nuevo registro de activoFinanzas relacionado
        $activoFinanzas = new ActivoFinanzas();
        $activoFinanzas->activo_id = $activo->id;
        
        // Guardar el activoFinanzas en la base de datos
        $activoFinanzas->save();

        // Crear un nuevo registro de activoServicios relacionado
        $activoServicios = new ActivoServicios();
        $activoServicios->activo_id = $activo->id;
            
        // Guardar el activoServicios en la base de datos
        $activoServicios->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Activo guardado exitosamente');
    }
}