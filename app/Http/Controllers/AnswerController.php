<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Answer;
use App\Models\User;


class AnswerController extends Controller
{
    public function answer_show(Request $request)
    {
        if (Auth::guest()) {
            return redirect('/home');
        }

        $id_question = $request->get("question-id");

        $questions = DB::table('questions')
                    ->where('id', '=' , $id_question)
                    ->first();

        $name_user_question = User::IdtoName($questions->user_id);

        if (Answer::UserAlreadyAnswer(Auth::user()->id, $id_question)) {
            return view('other-view.answer')
                    ->with(['errorMsg' => 'Hai già risposto a questa domanda, se vuoi puoi aggiornarla'])
                    ->with('name', $name_user_question)
                    ->with('questions', $questions);
        }
        else
        {
            return view('other-view.answer')
                    ->with('name', $name_user_question)
                    ->with('questions', $questions);
        }
    }


    /////   Gestisce l'inserimento di nuove domande   /////


    public function answer_store(Request $request)
    {

        if (Auth::guest()) {
            return redirect('/home');
        }

        $this->validate($request, [
            'question_id' => 'required',
            'content' => 'required | max: 1000',
        ]);

        Answer::storeAnswer($request);

        return redirect('/home')
            ->with('success', 'Domanda inserita correttamente');
    }
}
