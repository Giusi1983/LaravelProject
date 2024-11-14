<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Models\Client;

// Route per la pagina di benvenuto
Route::get('/', function () {
    return view('welcome');
});

// Route per la homepage (accessibile solo se autenticato)
Route::get('/home', function () {
    return view('home');
})->middleware('auth')->name('home');

// Route per visualizzare i clienti (ordinati per cognome)
Route::get('/clients', function () {
    // Recupera tutti i clienti, ordinati per cognome
    $clients = Client::orderBy('last_name')->get();  // Ordinamento per cognome

    // Mostra la vista con i clienti
    return view('clients.index', ['clients' => $clients]);
})->middleware('auth')->name('clients.index');

// Mostra le fatture di un cliente specifico
Route::get('/client/{id}', function ($id) {
    // Recupera il cliente per ID
    $client = Client::findOrFail($id);

    // Recupera tutte le fatture associate a questo cliente
    $invoices = $client->invoices;  // Relazione hasMany

    // Mostra la vista del cliente con le sue fatture
    return view('clients.show', ['client' => $client, 'invoices' => $invoices]);
})->middleware('auth')->name('clients.show');

// Crea un nuovo client con dati fittizi
Route::get('/clients/create', function() {
    $client = Client::create([
        'first_name'=> 'Livio',
        'last_name'=> 'Bianchi',
        'email' => 'livio.bianchi@prova.it',
        'phone' => '1234567890',
        'address' => 'Via Roma, 1',
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return view('clients.create', ['client' => $client]);
})->middleware('auth')->name('clients.create');

//Route per creare un nuovo cliente
Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');

// Route per eliminare un cliente
Route::delete('/clients/{id}', function ($id) {
    $client = Client::find($id);

    if ($client) {
        $client->delete();
        return response()->json(['success' => true, 'message' => 'Cliente eliminato con successo']);
    } else {
        return response()->json(['success' => false, 'message' => 'Cliente non trovato']);
    }
})->middleware('auth')->name('clients.delete');

//Per visualizzare l'elenco delle fatture
Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');

//Per la pagina dei contatti
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::post('/contacts',  [ContactController::class, 'store'])->name('contacts.store');


// // Route per il dashboard (accessibile solo se autenticato e verificato)
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Routes per il profilo utente
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inclusione dei file di autenticazione (gestisce login, registrazione, etc.)
require __DIR__.'/auth.php';
