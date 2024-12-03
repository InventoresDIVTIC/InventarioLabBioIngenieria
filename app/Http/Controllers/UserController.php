<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

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

        $request->validate([
            'code' => 'required',
            'code' => 'unique:users,code',
            'email' => 'required',
            'email' => 'unique:users,email',
        ]);
    }

    public function users_edit($id, Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'code' => 'required|unique:users,code,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'name' => 'required|string',
            'lastname' => 'required|string',
            'rol' => 'required|exists:roles,name', // Verificar que el rol existe en la tabla roles
            'area' => 'nullable|string',
            'phone' => 'nullable|string',
        ]);

        // Obtener el usuario existente por ID
        $user = User::find($id);

        // Verificar si el usuario existe
        if (!$user) {
            return redirect()->back()->with('error', 'Usuario no encontrado');
        }

        // Actualizar los datos del usuario
        $user->update([
            'code' => $request->code,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'rol' => $request->rol,
            'area' => $request->area,
            'phone' => $request->phone,
        ]);

        // Sincronizar los roles del usuario
        $user->syncRoles([$request->rol]);

        return redirect()->back()->with('status', 'Usuario actualizado exitosamente');
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
