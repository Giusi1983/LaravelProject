<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        // Validazione dei dati
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|string|max:20',
        ]);

        // Creazione del nuovo cliente
        $client = Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        // Ritorna una risposta JSON con i dati del nuovo cliente e un messaggio di successo
        return response()->json([
            'success' => true,
            'client' => $client,
            'message' => 'Cliente aggiunto con successo!'
        ]);
    }
}
