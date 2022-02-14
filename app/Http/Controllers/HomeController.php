<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;

class HomeController extends Controller
{

    public function home(){

         /// Lista tutte le domande presenti  ///

        $questions = Question::listQuestions();

        $countAnswer = Answer::countAnswer($questions->id);

        ///  La gestione della home avviene direttamente nelle view ///

        return view('home-view.home')
                ->with('questions', $questions)
                ->with('countAnswer', $countAnswer);

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
