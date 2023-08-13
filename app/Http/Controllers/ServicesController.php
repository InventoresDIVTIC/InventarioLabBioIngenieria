<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicios; 

class ServicesController extends Controller
{
    // ...

    public function guardarServicios(Request $request)
    {
        // Validar los datos recibidos del formulario
        $request->validate([
            'status' => 'required',
            'services_type' => 'required',
            'supplier_name' => 'required',
            'type' => 'required',
            'model' => 'required',
            'scheduled_date' => 'required|date',
            'assigned_engineer' => 'required|string',
        ]);
        
        $user_id = Auth::id();
        $user_name = Auth::user()->name;
        

        // Crear una nueva instancia del modelo Servicios y asignar los valores recibidos del formulario
        $service = new Servicios();
        $service->user_id = $user_id;
        $service->user_name = $user_name;
        $service->status = $request->input('status');
        $service->services_type  = $request->input('services_type');
        $service->supplier_name = $request->input('supplier_name');
        $service->supplier_id = $request->input('supplier_id');
        $service->active_name = $request->input('type');
        $service->active_model = $request->input('model');
        $service->active_sublocation = $request->input('sublocation');
        $service->active_id = $request->input('active_id');
        $service->scheduled_date = $request->input('scheduled_date');
        $service->assigned_engineer = $request->input('assigned_engineer');

        // Guardar el registro en la base de datos
        $service->save();

        // Redirigir a la página de servicios o mostrar un mensaje de éxito
        return redirect()->route('services')->with('success', 'El servicio se ha registrado correctamente.');
    }
}

