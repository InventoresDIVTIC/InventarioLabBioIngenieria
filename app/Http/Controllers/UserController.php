<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::select("*")
                        ->whereNotNull('last_seen')
                        ->orderBy('last_seen', 'DESC')
                        ->paginate(10);

        return view('users', compact('users'));
    }

    public function users_edit($id, Request $request)
    {
        // Obtener el proveedor existente por ID
        $users = User::find($id);

        // Verificar si el proveedor existe
        if (!$users) {
            return redirect()->back()->with('error', 'usuario no encontrado');
        }

        // Actualizar los datos del proveedor con los valores del formulario
        $users->code = $request->code;
        $users->name = $request->name;
        $users->lastname = $request->lastname;
        $users->email = $request->email;
        $users->rol = $request->rol;
        $users->area = $request->area;
        $users->phone = $request->phone;

        // Guardar los cambios en la base de datos
        $users->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'usuario actualizado exitosamente');
    }

    public function users_destroy($id, Request $request)
{
    // Buscar el usuario por ID
    $users = User::find($id);

    // Verificar si el usuario existe
    if (!$users) {
        return redirect()->back()->with('error', 'Usuario no encontrado');
    }

    // Eliminar el usuario
    $users->delete();

    // Redireccionar con un mensaje de éxito
    return redirect()->route('users')->with('status', 'usuario eliminado exitosamente');
}
}
