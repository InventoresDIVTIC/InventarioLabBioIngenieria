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
        $activoProveeduria->id = $activo->id;

        // Guardar el ActivoProveeduria en la base de datos
        $activoProveeduria->save();

        // Crear un nuevo registro de activoFinanzas relacionado
        $activoFinanzas = new ActivoFinanzas();
        $activoFinanzas->id = $activo->id;
        
        // Guardar el activoFinanzas en la base de datos
        $activoFinanzas->save();

        // Crear un nuevo registro de activoServicios relacionado
        $activoServicios = new ActivoServicios();
        $activoServicios->id = $activo->id;
            
        // Guardar el activoServicios en la base de datos
        $activoServicios->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Activo guardado exitosamente');
    }

    public function edit_actives($id, Request $request)
    {
        // Obtener el Activo existente por ID
        $activo = Activo::find($id);

        // Verificar si el proveedor existe
        if (!$activo) {
            return redirect()->back()->with('error', 'Activo no encontrado');
        }

        // Obtener el Nombre del usuario que esta editando
        $user_name = Auth::user()->name;

        // Actualizar los datos del proveedor con los valores del formulario
        $activo->type = $request->type;
        $activo->description = $request->description;
        $activo->category = $request->category;
        $activo->brand = $request->brand;
        $activo->model = $request->model;
        $activo->serial = $request->serial;
        $activo->location = $request->location;
        $activo->sublocation = $request->sublocation;
        $activo->status = $request->status;
        $activo->hierarchy = $request->hierarchy;
        $activo->criticality = $request->criticality;
        $activo->ing_assigned = $request->ing_assigned;
        $activo->last_editor = $user_name;
        $activo->software_ver = $request->software_ver;
        $activo->risk = $request->risk;
        $activo->so = $request->so;
        $activo->firmware_ver = $request->firmware_ver;
        $activo->comments = $request->comments;

        // Guardar los cambios en la base de datos
        $activo->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Activo actualizado exitosamente');
    }

    public function edit_actives_finanzas($id, Request $request)
    {
        // Obtener el Activo existente por ID
        $activo = ActivoFinanzas::find($id);

        // Verificar si el proveedor existe
        if (!$activo) {
            return redirect()->back()->with('error', 'Activo no encontrado');
        }

        // Actualizar los datos del proveedor con los valores del formulario
        $activo->bill_number = $request->bill_number;
        $activo->acquisition_date = $request->acquisition_date;
        $activo->installation_date = $request->installation_date;
        $activo->divisa = $request->divisa;
        $activo->price = $request->price;
        $activo->warranty_start = $request->warranty_start;
        $activo->warranty_end = $request->warranty_end;
        $activo->bill = $request->bill;
        $activo->warranty_letter = $request->warranty_letter;
        $activo->health_registration = $request->health_registration;
        $activo->import = $request->import;

        // Guardar los cambios en la base de datos
        $activo->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Activo actualizado exitosamente');
    }

    public function edit_actives_proveeduria($id, Request $request)
    {
        // Obtener el Activo existente por ID
        $activo = ActivoProveeduria::find($id);

        // Verificar si el proveedor existe
        if (!$activo) {
            return redirect()->back()->with('error', 'Activo no encontrado');
        }

        // Actualizar los datos del proveedor con los valores del formulario
        $activo->belonging = $request->belonging;
        $activo->owner = $request->owner;
        $activo->sold_by = $request->sold_by;
        $activo->guarder_by = $request->guarder_by;

        // Guardar los cambios en la base de datos
        $activo->save();

        // Obtener el Activo existente por ID
        $query = ActivoServicios::find($id);

        $query->frecuency_mprev = $request->frecuency_mprev;
        $query->service_provider = $request->service_provider;
        $query->last_mprev = $request->last_mprev;
        $query->next_mprev = $request->next_mprev;

        // Guardar los cambios en la base de datos
        $query->save();


        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Activo actualizado exitosamente');
    }

    public function edit_actives_baja($id, Request $request)
    {
        // Obtener el Activo existente por ID
        $activo = Activo::find($id);

        // Verificar si el proveedor existe
        if (!$activo) {
            return redirect()->back()->with('error', 'Activo no encontrado');
        }

        // Actualizar los datos del proveedor con los valores del formulario
        $activo->leaving_comments = $request->leaving_comments;
        $activo->motive = $request->motive;

        // Guardar los cambios en la base de datos
        $activo->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Activo actualizado exitosamente');
    }
}