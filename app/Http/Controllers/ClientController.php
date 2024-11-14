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
            'address' => 'nullable|string|max:255',  // L'indirizzo è opzionale
        ]);

        // Creazione del nuovo cliente
        $client = Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address, // Aggiungi l'indirizzo
        ]);

        // Ritorna alla vista con il cliente appena creato e i clienti aggiornati
        return redirect()->route('clients.index')->with('success', 'Cliente aggiunto con successo!');
    }
}
