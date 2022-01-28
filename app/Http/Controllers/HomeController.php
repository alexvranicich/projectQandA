<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;

class HomeController extends Controller
{
    
    public function home(Request $request){

         /// Lista tutte le domande presenti  ///

        $list_question = Question::list_questions();

        ///  Si guarda se è presente una variabile di sessione per decidere su che home finire ///
        
        if (Auth::check())
        {
            $log_id = Auth::user()->id;
           
            return view('home-view.home_session')
                ->with('question', $list_question)
                ->with('log_id' , $log_id);
        }
        else
        {
            return view('home-view.home')                           
                ->with('question', $list_question);
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
