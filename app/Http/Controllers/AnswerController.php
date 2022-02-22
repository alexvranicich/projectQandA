<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
            return view('answers-view.answerForm')
                    ->with(['errorMsg' => 'Hai già risposto a questa domanda, se vuoi puoi aggiornarla'])
                    ->with('name', $name_user_question)
                    ->with('questions', $questions);
        }
        else
        {
            return view('answers-view.answerForm')
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

        $id_question = $request->get("question_id");

        $this->validate($request, [
                'question_id' => 'required',
                'content' => 'required | max: 1000',
            ]);

        if (Answer::UserAlreadyAnswer(Auth::user()->id, $id_question))
        {
            Answer::updateAnswer($request);
                return redirect('/home')
                    ->with('success', 'Risposta aggiornata correttamente');
        }
        else
        {
            Answer::storeAnswer($request);
                return redirect('/home')
                    ->with('success', 'Risposta inserita correttamente');
        }

    }


    public function answer_list(Request $request)
    {

        if (Auth::guest()) {
            return redirect('/home');
        }

        if (!$request->has('id')){                                       //// segnalare che c'è stato un problema nel get id
            dd("Non sono riuscito a prendere l'id dalla domanda");
        }

        ///  Id appeso in href nella tabella delle question, recuperato con jquery  ///

        $question_id = $request->input('id');

        $question = DB::table('questions')
                    ->where('id', '=', $question_id)
                    ->first();

        $answers = DB::table('answers')
                    ->where('question_id', '=', $question_id)
                    ->join('users', 'users.id', '=', 'answers.user_id')
                    ->select('answers.id','answers.content','answers.user_id','users.name')
                    ->orderBy('answers.id')
                    ->paginate(5);


        return view('answers-view.answerList')
                ->with('question', $question)
                ->with('answers', $answers);
    }

}
