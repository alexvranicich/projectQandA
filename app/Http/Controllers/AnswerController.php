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
                        ->where('id', '=', "'$id_question'")
                        ->get();

            if (is_array($questions)){
                foreach ($questions as $question){
                    $user_id_question = $question->user_id;
                    $question_content = $question->content;
                }
            }

            $email_user_question = User::idtoEmail($user_id_question);

            if (Answer::UserAlreadyAnswer(Auth::user()->id, $id_question)) {
               return view('other-view.answer')
                        ->with(['error' => 'Hai già risposto a questa domanda'])
                        ->with('question_content', $question_content)
                        ->with('email_user_question', $email_user_question);
            }
            else
            {
                return view('other-view.answer')
                        ->with('question_content', $question_content)
                        ->with('email_user_question', $email_user_question);
            }

       
    }


    /////   Gestisce l'inserimento di nuove domande   /////


    public function answer_store(Request $request)
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
