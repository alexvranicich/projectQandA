<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;

class QuestionController extends Controller
{
    public function question_show(Request $request)
    {
        
        if(Auth::guest()){
            return redirect('/home');
        }
        else
            return view('other-view.question');
    }


    /////   Gestisce l'inserimento di nuove domande   /////


    public function question_store(QuestionRequest $request)
    {
        
        if (Auth::guest()) {
            return redirect('/home');
        }

        $validated = $request -> validate();

        return redirect('/home')
                ->with('success', 'Domanda inserita correttamente');

    }

}
