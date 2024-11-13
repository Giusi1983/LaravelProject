<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Validation\Rules;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostra il modulo di login.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Gestisce la richiesta di login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Convalida i dati inviati dal modulo di login
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Tentativo di login con le credenziali fornite
        if (Auth::attempt($request->only('email', 'password'))) {
            // Rigenera la sessione per evitare attacchi di session fixation
            $request->session()->regenerate();

            // Dopo il login, reindirizza l'utente alla rotta precedente (se presente) o alla home
            return redirect()->intended(route('home'));  // Assicurati che la rotta 'home' sia definita
        }

        // Se il login fallisce, torna indietro con errore
        return back()->withErrors([
            'email' => 'Le credenziali non sono corrette.',
        ]);
    }

    /**
     * Gestisce il logout dell'utente.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // Effettua il logout dell'utente
        Auth::logout();

        // Rimuove tutte le informazioni della sessione
        $request->session()->invalidate();

        // Rigenera la sessione per prevenire attacchi di session fixation
        $request->session()->regenerateToken();

        // Reindirizza l'utente alla pagina di login
        return redirect()->route('login');
    }
}
