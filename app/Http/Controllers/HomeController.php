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

        ///  Si guarda se è presente una variabile di sessione per decidere su che home finire ///

        if (Auth::check())
        {
            $log_id = Auth::user()->id;

            return view('home-view.home_session')
                ->with('questions', $questions)
                ->with('log_id' , $log_id);
        }
        else
        {
            return view('home-view.home')
                ->with('questions', $questions);
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
