<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(Request $request)
    {
        // Validazione dei dati
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',  // Assicurati che l'email sia unica
            'phone' => 'required|string|max:20',  // Puoi regolare la lunghezza a seconda delle tue esigenze
            'address' => 'nullable|string|max:255',  // Campo opzionale per l'indirizzo
        ]);

        try {
            // Creazione del nuovo cliente
            $client = Client::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? null,  // Impostazione dell'indirizzo solo se fornito
            ]);

            // Risposta JSON
            return response()->json([
                'success' => true,
                'client' => $client,
                'message' => 'Cliente aggiunto con successo!'
            ], 201);  // 201 per indicare che è stato creato correttamente

        } catch (\Exception $e) {
            // Gestione degli errori (esempio)
            return response()->json([
                'success' => false,
                'message' => 'Errore nella creazione del cliente: ' . $e->getMessage()
            ], 500);  // 500 per errore interno del server
        }
    }
}
