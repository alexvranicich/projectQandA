<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login_show()
    {
        return view('login');
    }

    public function login_validation(LoginRequest $request){


        if ($request->session()->has('log')) 
        {
            $request->session()->forget('log');
            $request->session()->invalidate();
        }

        $credentials = $request->getCredentials();

        $log_id = User::EmailtoId($credentials['email']);

        
        ///  Attempt controlla se le cresenziali passate esistono nel database   ///
        ///  In caso affermativo restituisce true ed effettua il login            /// 
        
        if (Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            $request->session()->put('log', $log_id);
            
            return redirect('/home');
        }
        
        return back()->withErrors([
            'exist' => '*Mail o password errati, riprova',
        ]);
        

    }
    
}
