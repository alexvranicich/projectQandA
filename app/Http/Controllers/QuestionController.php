<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Question;


class QuestionController extends Controller
{
    public function question_show()
    {

        if(Auth::guest()){
            return redirect('/home');
        }
        else
            return view('other-view.question');
    }


    /////   Gestisce l'inserimento di nuove domande   /////


    public function question_store(Request $request)
    {

        if (Auth::guest()) {
            return redirect('/home');
        }

        $this->validate($request, [
            'title' => 'required | min:3 | max: 100',
            'content' => 'required | max: 200',
        ]);

        Question::storeQuestion($request);

        return redirect('/home')
                ->with('success', 'Domanda inserita correttamente');

    }

}
