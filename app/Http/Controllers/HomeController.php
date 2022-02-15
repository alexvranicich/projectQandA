<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class HomeController extends Controller
{

    public function home(){

         /// Lista tutte le domande presenti  ///

        $questions = Question::listQuestions();

        $answers = Answer::all();



        ///  La gestione della home avviene direttamente nelle view ///

        return view('home-view.home')
                ->with('questions', $questions)
                ->with('answers', $answers);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }


    public function search(Request $request){
        $search = Question::query();
        if (request('term')) {
            $search->where('name', 'Like', '%' . request('term') . '%');
        }

        return $search->orderBy('id', 'DESC')->paginate(10);
    }

}
