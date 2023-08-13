<?php

namespace App\Http\Controllers;

use App\Models\Proveedores;
use Illuminate\Http\Request;
use App\Http\Requests\SuppliersRequest;

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
}
