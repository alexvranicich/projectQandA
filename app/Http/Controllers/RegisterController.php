<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class RegisterController extends Controller
{
    public function register_show()
    {
        return view('auth-view.register');
    }

    public function register_validation(RegisterRequest $request)
    {

        /// Se presente una sessione la interrompo per creare un nuova variabile di sessione e il rispettivo token ///

        if (Auth::check())
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        //// Valida form registrazione ////

        $validated = $request->validated();

        //// Salva l'untente nuovo nel database  ////

        $user = User::storeUser($validated);

        //// Logga l'utente e salva variabile dell'utente ////

        Auth::login($user);

        //// Return home route, it choose view home ////

        return redirect('/home')
                ->with('success', "Account registrato correttamente");

    }

}
