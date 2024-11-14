<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        // Logica per visualizzare le fatture (se necessario)
        return view('invoices.index');  // Assicurati che la vista `invoices.index` esista
    }
}
