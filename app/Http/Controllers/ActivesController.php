<?php

namespace App\Http\Controllers;

use App\Models\Activo;
use App\Models\ActivoProveeduria;
use App\Models\ActivoFinanzas;
use App\Models\ActivoServicios;
use App\Models\Servicios;
use App\Models\ServiciosDetalles;
use App\Models\ServiciosFirmas;
use App\Models\ServiciosGastos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ActivesController extends Controller
{
    public function guardar(Request $request)
    {
        // Validar los datos del formulario si es necesario
        $validatedData = $request->validate([
            'id' => 'required',
            'id' => 'unique:activos,id',
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
            'class' => 'required',
        ]);

        // Obtener el ID del usuario autenticado
        $user_id = Auth::id();
        $user = Auth::user();

        if ($user->rol === 'Admin') {
            // Crear un nuevo registro de Activo
            $activo = new Activo();
            $activo->id = $validatedData['id'];
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
            $activo->class = $validatedData['class'];

            // Guardar el Activo en la base de datos
            $activo->save();

            // Crear un nuevo registro de ActivoProveeduria relacionado
            $activoProveeduria = new ActivoProveeduria();
            $activoProveeduria->belonging = $validatedData['belonging'];
            $activoProveeduria->id = $request->id; //usar request

            // Guardar el ActivoProveeduria en la base de datos
            $activoProveeduria->save();

            // Crear un nuevo registro de activoFinanzas relacionado
            $activoFinanzas = new ActivoFinanzas();
            $activoFinanzas->id = $request->id;

            // Guardar el activoFinanzas en la base de datos
            $activoFinanzas->save();

            $ultimoServicio = Servicios::orderBy('id', 'desc')->first();

            // Verificar si existe al menos un servicio en la base de datos
            if ($ultimoServicio) {
                $nuevoIdServicio = $ultimoServicio->id + 1;
            } else {
                // Si no hay servicios en la base de datos, empezar desde 1
                $nuevoIdServicio = 1;
            }
            $userId = Auth::user()->id;
            $user_name = Auth::user()->name;
            // Crear un nuevo registro de Servicio
            $Servicios = new Servicios();
            $Servicios->user_id = $userId;
            $Servicios->user_name = $user_name;
            $Servicios->id = $nuevoIdServicio;
            $Servicios->active_name = $request->type;
            $Servicios->active_model = $request->model;
            $Servicios->active_sublocation = $request->sublocation;
            $Servicios->status = "Generado automaticamente";

            // Obtener la fecha actual
            $fechaCreacion = Carbon::now();

            // Agregar un año a la fecha de creación
            $fechaMantenimiento = $fechaCreacion->copy()->addYear();

            // Asignar la fecha de mantenimiento
            $Servicios->scheduled_date = $fechaMantenimiento;

            // Guardar el nuevo servicio en la base de datos
            $Servicios->save();

            // Crear un nuevo registro de ActivoProveeduria relacionado
            $ServiciosDetalles = new ServiciosDetalles();
            $ServiciosDetalles->id = $Servicios->id;

            // Guardar el ActivoProveeduria en la base de datos
            $ServiciosDetalles->save();

            // Crear un nuevo registro de activoFinanzas relacionado
            $ServiciosFirmas = new ServiciosFirmas();
            $ServiciosFirmas->id = $Servicios->id;

            // Guardar el activoFinanzas en la base de datos
            $ServiciosFirmas->save();

            // Crear un nuevo registro de activoServicios relacionado
            $ServiciosGastos = new ServiciosGastos();
            $ServiciosGastos->id = $Servicios->id;

            // Guardar el activoServicios en la base de datos
            $ServiciosGastos->save();

            // Crear un nuevo registro de activoServicios relacionado
            $activoServicios = new ActivoServicios();
            $activoServicios->id = $request->id;
            $activoServicios->next_mprev = $fechaMantenimiento;
            // Guardar el activoServicios en la base de datos
            $activoServicios->save();

            // Redireccionar o realizar otras acciones según tus necesidades
            return redirect()->back()->with('status', 'Activo guardado exitosamente');
        }
        else {
            // El usuario no tiene permisos
            return redirect()->back()->with('error', 'No tienes permisos para guardar este ticket');
        }
    }

    public function edit_actives($id, Request $request)
    {
        // Obtener el Activo existente por ID
        $activo = Activo::find($id);

        // Verificar si el activo existe
        if (!$activo) {
            return redirect()->back()->with('error', 'Activo no encontrado');
        }

         // Verificar si se proporcionó una firma nueva
         if ($request->hasFile('manual_doc')) {
            $request->validate([
                'manual_doc' => ['mimes:txt,TXT,pdf,PDF', 'max:10240'],
            ]);

            // Eliminar el documento existente si hay uno
            if ($activo->manual_doc) {
                // Asegúrate de que el documento existente tenga una ruta válida
                if (file_exists(public_path($activo->manual_doc))) {
                    unlink(public_path($activo->manual_doc));
                }
            }

            $manual_doc_File = $request->file('manual_doc');

            // Asegúrate de que la carpeta de destino exista
            $destinationFolder = public_path('Activos-doc-manual');
            if (!file_exists($destinationFolder)) {
                mkdir($destinationFolder, 0755, true);
            }

            // Genera un nombre único para el archivo
            $documentName = uniqid() . '_' . $manual_doc_File->getClientOriginalName();

            // Mueve el archivo a la carpeta de destino con el nuevo nombre
            $manual_doc_File->move($destinationFolder, $documentName);

            // Guarda la ruta relativa del nuevo documento en la base de datos
            $activo->manual_doc = 'Activos-doc-manual/' . $documentName;
        }

        // Obtener el Nombre del usuario que esta editando
        $user_name = Auth::user()->name;
        $user = Auth::user();

        if ($user->rol === 'Admin') {
            // Actualizar los datos del activo con los valores del formulario
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
            $activo->class = $request->class;

            // Verificar si el status es "Baja" para asignar la fecha de hoy
            if ($request->status === 'Baja') {
                $activo->leaving_date = now(); // Almacena la fecha y hora actual
            } else {
                $activo->leaving_date = null; // Si no es "Baja", puede quedar en null o mantener el valor actual
            }

            // Guardar los cambios en la base de datos
            $activo->save();

            // Redireccionar o realizar otras acciones según tus necesidades
            return redirect()->back()->with('status', 'Activo actualizado exitosamente');
        } else {
            // El usuario no tiene permisos
            return redirect()->back()->with('error', 'No tienes permisos para guardar este ticket');
        }
    }

    public function edit_actives_finanzas($id, Request $request)
    {
        $user = Auth::user();

        if ($user->rol === 'Admin') {
        // Obtener el Activo existente por ID
        $activo = ActivoFinanzas::find($id);

        // Verificar si el proveedor existe
        if (!$activo) {
            return redirect()->back()->with('error', 'Activo no encontrado');
        }

         // Verificar si se proporcionó una firma nueva
         if ($request->hasFile('warranty_letter')) {
            $request->validate([
                'warranty_letter' => ['mimes:txt,TXT,pdf,PDF', 'max:10240'],
            ]);

            // Eliminar el documento existente si hay uno
            if ($activo->warranty_letter) {
                // Asegúrate de que el documento existente tenga una ruta válida
                if (file_exists(public_path($activo->warranty_letter))) {
                    unlink(public_path($activo->warranty_letter));
                }
            }

            $warranty_letter_File = $request->file('warranty_letter');

            // Asegúrate de que la carpeta de destino exista
            $destinationFolder = public_path('Activos-doc-signature');
            if (!file_exists($destinationFolder)) {
                mkdir($destinationFolder, 0755, true);
            }

            // Genera un nombre único para el archivo
            $documentName = uniqid() . '_' . $warranty_letter_File->getClientOriginalName();

            // Mueve el archivo a la carpeta de destino con el nuevo nombre
            $warranty_letter_File->move($destinationFolder, $documentName);

            // Guarda la ruta relativa del nuevo documento en la base de datos
            $activo->warranty_letter = 'Activos-doc-signature/' . $documentName;
        }

        // Verificar si se proporcionó una firma nueva
        if ($request->hasFile('health_registration')) {
            $request->validate([
                'health_registration' => ['mimes:txt,TXT,pdf,PDF', 'max:10240'],
            ]);

            // Eliminar el documento existente si hay uno
            if ($activo->health_registration) {
            // Asegúrate de que el documento existente tenga una ruta válida
            if (file_exists(public_path($activo->health_registration))) {
                    unlink(public_path($activo->health_registration));
                }
            }

            $health_registration_File = $request->file('health_registration');

            // Asegúrate de que la carpeta de destino exista
            $destinationFolder = public_path('Activos-doc-signature');
            if (!file_exists($destinationFolder)) {
                mkdir($destinationFolder, 0755, true);
            }

            // Genera un nombre único para el archivo
            $documentName = uniqid() . '_' . $health_registration_File->getClientOriginalName();

            // Mueve el archivo a la carpeta de destino con el nuevo nombre
            $health_registration_File->move($destinationFolder, $documentName);

            // Guarda la ruta relativa del nuevo documento en la base de datos
            $activo->health_registration = 'Activos-doc-signature/' . $documentName;
        }

        // Verificar si se proporcionó una firma nueva
        if ($request->hasFile('bill')) {
            $request->validate([
                'bill' => ['mimes:txt,TXT,pdf,PDF', 'max:10240'],
            ]);

            // Eliminar el documento existente si hay uno
            if ($activo->bill) {
            // Asegúrate de que el documento existente tenga una ruta válida
            if (file_exists(public_path($activo->bill))) {
                    unlink(public_path($activo->bill));
                }
            }

            $bill_File = $request->file('bill');

            // Asegúrate de que la carpeta de destino exista
            $destinationFolder = public_path('Activos-doc-signature');
            if (!file_exists($destinationFolder)) {
                mkdir($destinationFolder, 0755, true);
            }

            // Genera un nombre único para el archivo
            $documentName = uniqid() . '_' . $bill_File->getClientOriginalName();

            // Mueve el archivo a la carpeta de destino con el nuevo nombre
            $bill_File->move($destinationFolder, $documentName);

            // Guarda la ruta relativa del nuevo documento en la base de datos
            $activo->bill = 'Activos-doc-signature/' . $documentName;
        }

        // Actualizar los datos del proveedor con los valores del formulario
        $activo->bill_number = $request->bill_number;
        $activo->acquisition_date = $request->acquisition_date;
        $activo->installation_date = $request->installation_date;
        $activo->divisa = $request->divisa;
        $activo->price = $request->price;
        $activo->warranty_start = $request->warranty_start;
        $activo->warranty_end = $request->warranty_end;
        $activo->import = $request->import;

        // Guardar los cambios en la base de datos
        $activo->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Activo actualizado exitosamente');
        }
        else {
            // El usuario no tiene permisos
            return redirect()->back()->with('error', 'No tienes permisos para guardar este ticket');
        }
    }

    public function edit_actives_proveeduria($id, Request $request)
    {
        $user = Auth::user();

        if ($user->rol === 'Admin') {
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
    else {
        // El usuario no tiene permisos
        return redirect()->back()->with('error', 'No tienes permisos para guardar este ticket');
    }
    }

    public function edit_actives_baja($id, Request $request)
    {
        $user = Auth::user();

        if ($user->rol === 'Admin') {
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
        else {
            // El usuario no tiene permisos
            return redirect()->back()->with('error', 'No tienes permisos para guardar este ticket');
        }
    }

    public function Datotemp($data)
    {
        session()->flash('id', $data);
        $id = session()->get('id');
        return redirect()->route('inventory-edit', ['id' => $id]); // Redirige a la ruta que muestra la vista de edición
    }

    public function DatotempTickets($data)
    {
        session()->flash('idTicket', $data);
        $id = session()->get('idTicket');
        return redirect()->route('tickets-creation', ['id' => $id]); // Redirige a la ruta que muestra la vista de edición
    }


}
