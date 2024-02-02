<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicios;
use App\Models\ServiciosDetalles;
use App\Models\ServiciosFirmas;
use App\Models\ServiciosGastos;

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

        // Crear un nuevo registro de ActivoProveeduria relacionado
        $ServiciosDetalles = new ServiciosDetalles();
        $ServiciosDetalles->id = $service->id;

        // Guardar el ActivoProveeduria en la base de datos
        $ServiciosDetalles->save();

        // Crear un nuevo registro de activoFinanzas relacionado
        $ServiciosFirmas = new ServiciosFirmas();
        $ServiciosFirmas->id = $service->id;

        // Guardar el activoFinanzas en la base de datos
        $ServiciosFirmas->save();

        // Crear un nuevo registro de activoServicios relacionado
        $ServiciosGastos = new ServiciosGastos();
        $ServiciosGastos->id = $service->id;

        // Guardar el activoServicios en la base de datos
        $ServiciosGastos->save();

        // Redirigir a la página de servicios o mostrar un mensaje de éxito
        return redirect()->route('services')->with('success', 'El servicio se ha registrado correctamente.');
    }

    public function edit_services($id, Request $request)
    {
        // Obtener el proveedor existente por ID
        $service = Servicios::find($id);

        // Verificar si el proveedor existe
        if (!$service) {
            return redirect()->back()->with('error', 'Servicio no encontrado');
        }

        // Actualizar los datos del proveedor con los valores del formulario
        $service->status = $request->status;
        $service->services_type = $request->services_type;
        $service->service_type = $request->service_type;
        $service->supplier_name = $request->supplier_name;
        $service->supplier_id = $request->supplier_id;
        $service->active_name = $request->type;
        $service->active_id = $request->active_id;
        $service->active_model = $request->model;
        $service->foil = $request->foil;
        $service->origin = $request->origin;
        $service->reference = $request->reference;
        $service->active_sublocation = $request->active_sublocation;
        $service->scheduled_date = $request->scheduled_date;
        $service->assigned_engineer = $request->assigned_engineer;

        // Guardar los cambios en la base de datos
        $service->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Servicio actualizado exitosamente');
    }

    public function edit_services_detalles($id, Request $request)
    {
        // Obtener el proveedor existente por ID
        $service = ServiciosDetalles::find($id);

        // Verificar si el proveedor existe
        if (!$service) {
            return redirect()->back()->with('error', 'Servicio no encontrado');
        }

        // Actualizar los datos del proveedor con los valores del formulario
        $service->assigned_enginier = $request->assigned_enginier;
        $service->start_date = $request->start_date;
        $service->end_date = $request->end_date;
        $service->starting_hour = $request->starting_hour;
        $service->end_hour = $request->end_hour;
        $service->summary = $request->summary;
        $service->description = $request->description;
        $service->conclusions = $request->conclusions;

        // Guardar los cambios en la base de datos
        $service->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Servicio actualizado exitosamente');
    }


    public function edit_services_firmas($id, Request $request)
    {
        // Obtener el servicio existente por ID
        $service = ServiciosFirmas::find($id);

        // Verificar si el servicio existe
        if (!$service) {
            return redirect()->back()->with('error', 'Servicio no encontrado');
        }

        // Decodificar y asignar las firmas
        $service->service_head_signature = base64_decode($request->service_head_signature);
        $service->service_enigieer_signature = base64_decode($request->service_enigieer_signature); // Corregir el nombre del campo
        $service->last_user_signature = base64_decode($request->last_user_signature);

        // Guardar los cambios en la base de datos
        $service->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Servicio actualizado exitosamente');
    }



    public function edit_services_gastos($id, Request $request)
    {
        // Obtener el servicio existente por ID
        $service = ServiciosGastos::find($id);

        // Verificar si el servicio existe
        if (!$service) {
            return redirect()->back()->with('error', 'Servicio no encontrado');
        }

        // Verificar si se proporcionó un nuevo anexo
        if ($request->hasFile('annex')) {
            $request->validate([
                'annex' => ['mimes:txt,TXT,pdf,PDF', 'max:10240'],
            ]);

            // Eliminar el documento existente si hay uno
            if ($service->annex) {
                // Asegúrate de que el documento existente tenga una ruta válida
                if (file_exists(public_path($service->annex))) {
                    unlink(public_path($service->annex));
                }
            }

            $annexFile = $request->file('annex');

            // Asegúrate de que la carpeta de destino exista
            $destinationFolder = public_path('Services-doc');
            if (!file_exists($destinationFolder)) {
                mkdir($destinationFolder, 0755, true);
            }

            // Genera un nombre único para el archivo
            $documentName = uniqid() . '_' . $annexFile->getClientOriginalName();

            // Mueve el archivo a la carpeta de destino con el nuevo nombre
            $annexFile->move($destinationFolder, $documentName);

            // Guarda la ruta relativa del nuevo documento en la base de datos
            $service->annex = 'Services-doc/' . $documentName;
        }

        // Actualizar otros datos del servicio con los valores del formulario
        $service->service_expense = $request->service_expense;
        $service->parts_expense = $request->parts_expense;
        $service->total = $request->total;

        // Guardar los cambios en la base de datos
        $service->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Servicio actualizado exitosamente');
    }
}

