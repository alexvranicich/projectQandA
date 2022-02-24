<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;

class HomeController extends Controller
{

    public function home(Request $request){

        /// Lista tutte le domande presenti  ///

        $answers = Answer::all();

        /// Pagination  ///

        if($request->input('search')){
            $questions = Question::searchQuestion($request);
        }
        else{
            $questions = Question::listQuestions();
        }

        if ($request->ajax()) {

            return view('components.tables.question-table')
            ->with('questions', $questions)
            ->with('answers', $answers)
            ->render();
        }

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


    public function search(Request $request)
    {
        $questions = Question::searchQuestion($request);
        $answers = Answer::all();

        return view('home-view.home')
            ->with('answers', $answers)
            ->with('questions', $questions);
    }


}
