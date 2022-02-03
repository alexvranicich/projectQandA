<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;

class HomeController extends Controller
{

    public function home(){

         /// Lista tutte le domande presenti  ///

        $questions = Question::list_questions();

        ///  La gestione della home avviene direttamente nelle view ///

        return view('home-view.home')
                ->with('questions', $questions);

    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
