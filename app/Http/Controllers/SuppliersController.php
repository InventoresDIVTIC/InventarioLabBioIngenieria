<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use App\Http\Requests\SuppliersRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class SuppliersController extends Controller
{
    public function save(SuppliersRequest $request)
    {
        // Crear un nuevo registro de Proveedor
        $proveedor = new Proveedores();
        $proveedor->name = $request->name;
        $proveedor->company_name = $request->company_name;
        $proveedor->city = $request->city;
        $proveedor->state = $request->state;
        $proveedor->country = $request->country;
        $proveedor->phone = $request->phone;
        $proveedor->site_web = $request->site_web;
        $proveedor->business_email = $request->business_email;

        // Guardar el Proveedor en la base de datos
        $proveedor->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Proveedor guardado exitosamente');
    }


    public function edit_suppliers($id, SuppliersRequest $request)
    {
        // Obtener el proveedor existente por ID
        $proveedor = Proveedores::find($id);

        // Verificar si el proveedor existe
        if (!$proveedor) {
            return redirect()->back()->with('error', 'Proveedor no encontrado');
        }

        // Actualizar los datos del proveedor con los valores del formulario
        $proveedor->name = $request->name;
        $proveedor->company_name = $request->company_name;
        $proveedor->city = $request->city;
        $proveedor->state = $request->state;
        $proveedor->country = $request->country;
        $proveedor->phone = $request->phone;
        $proveedor->site_web = $request->site_web;
        $proveedor->business_email = $request->business_email;
        $proveedor->site_web = $request->site_web;
        $proveedor->engineer = $request->engineer;
        $proveedor->support_email = $request->support_email;
        $proveedor->description = $request->description;
        $proveedor->category = $request->category;

        // Guardar los cambios en la base de datos
        $proveedor->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Proveedor actualizado exitosamente');
    }
}
