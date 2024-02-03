<?php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

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
        $ticket->status = "Pendiente";

        // Guardar el Ticket en la base de datos
        $ticket->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Ticket guardado exitosamente');
    }

    public function edit_tickets($id, Request $request)
    {
        // Obtener el ticket existente por ID
        $ticket = Tickets::find($id);

        // Verificar si el ticket existe
        if (!$ticket) {
            return redirect()->back()->with('error', 'Ticket no encontrado');
        }

        // Obtener el Nombre del usuario que esta editando
        $user_name = Auth::user()->name;

        // Actualizar los datos del ticket con los valores del formulario
        $ticket->type = $request->type;
        $ticket->request = $request->get('request');
        $ticket->type_request = $request->type_request;
        $ticket->priority = $request->priority;
        $ticket->status = $request->status;
        $ticket->last_editor = $user_name;
        $ticket->solution = $request->solution;
        //$ticket->commets = $request->comments;

        // Guardar los cambios en la base de datos
        $ticket->save();

        // Redireccionar o realizar otras acciones según tus necesidades
        return redirect()->back()->with('status', 'Ticket actualizado exitosamente');
    }

}