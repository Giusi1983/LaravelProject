<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Client;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    // Metodo per visualizzare tutte le fatture
    public function index()
    {
        // Recupera tutte le fatture dal database
        $invoices = Invoice::all();

        // Restituisci la vista con l'elenco delle fatture
        return view('invoices.index', compact('invoices'));
    }

    // Metodo per creare una nuova fattura
    public function store(Request $request)
    {
        // Validazione dei dati del form
        $request->validate([
            'client_id' => 'required|exists:clients,id', // Verifica che il client esista
            'invoice_number' => 'required|unique:invoices,invoice_number', // Numero fattura unico
            'invoice_date' => 'required|date', // Verifica che sia una data valida
            'total_amount' => 'required|numeric|min:0', // Assicurati che sia un valore numerico positivo
        ]);

        // Tentiamo di creare la fattura
        try {
            // Creazione della fattura nel database
            $invoice = Invoice::create([
                'client_id' => $request->client_id, // ID del cliente
                'invoice_number' => $request->invoice_number, // Numero fattura
                'invoice_date' => $request->invoice_date, // Data fattura
                'total_amount' => $request->total_amount, // Importo totale
            ]);

            // Messaggio di successo dopo la creazione della fattura
            return redirect()->route('invoices.index')  // Reindirizza alla lista delle fatture
                ->with('success', 'Fattura creata con successo!');
        } catch (\Exception $e) {
            // Se si verifica un errore, ritorna un messaggio di errore
            return redirect()->back()->with('error', 'Si è verificato un errore durante la creazione della fattura. Riprova.');
        }
    }

    // Metodo per visualizzare le fatture di un cliente specifico
    public function show($id)
    {
        // Trova il cliente per ID
        $client = Client::findOrFail($id);

        // Recupera tutte le fatture associate a questo cliente (relazione hasMany)
        $invoices = $client->invoices;

        // Restituisci la vista con il cliente e le fatture
        return view('clients.show', compact('client', 'invoices'));
    }
}
