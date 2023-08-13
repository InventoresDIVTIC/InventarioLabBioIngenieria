<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketsController extends Controller
{
    public function saveTicket(Request $request)
    {
        //return $request;
        // Validar los datos del formulario si es necesario
        $request->validate([
            'active_id' => 'required',
            'type' => 'required',
            'request' => 'required',
            'type_request' => 'required',
            'priority' => 'required',
        ]);

        // Obtener el ID del usuario autenticado
        $user_id = Auth::id();
        
        // Crear un nuevo registro de Ticket 	 	
        $ticket = new Tickets();
        $ticket->user_id = $user_id;
        $ticket->active_id = intval($request->input('active_id'));
        $ticket->type = $request->input('type');
        $ticket->request = $request->input('request');
        $ticket->type_request = $request->input('type_request');
        $ticket->priority = $request->input('priority');
        $ticket->status = "pendiente";

        // Guardar el Ticket en la base de datos
        $ticket->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Ticket guardado exitosamente');
    }
}