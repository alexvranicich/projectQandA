<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login_show()
    {
        if (Auth::check()) {

            Auth::logout();
            session()->invalidate();
            session()->regenerateToken();
        }

        return view('auth-view.login');
    }

    public function login_validation(LoginRequest $request){


        if (Auth::check())
        {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        }

        $credentials = $request->getCredentials();

        ///  Attempt controlla se le credenziali passate esistono nel database   ///
        ///  In caso affermativo attempt restituisce true ed effettua automaticamnete il login  ///

        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect('/home');
        }

        return back()->withErrors([
            'error' => '* Mail o password errati, riprova *',
        ]);


    }

}
