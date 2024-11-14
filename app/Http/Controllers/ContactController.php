<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        // Visualizza la pagina del supporto clienti
        return view('contacts.index');
    }

    public function store(Request $request)
    {
        // Gestisci l'invio del form di supporto
        
        // Validazione semplice (adatta alle tue esigenze)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // Logica per salvare i dati o inviare un'email di supporto

        return redirect()->route('contacts.index')->with('success', 'Richiesta inviata con successo.');
    }
}
