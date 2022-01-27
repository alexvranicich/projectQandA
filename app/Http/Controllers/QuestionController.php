<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuestionRequest;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;

class QuestionController extends Controller
{
    public function question_show(Request $request)
    {
        
        if($request->session()->missing('log')){
            return redirect('/home');
        }

        $log_id = session()->get('log'); 
        $log_email = User::IdtoEmail($log_id);

        return view('register')
                -> with('log_email', $log_email); 
    }


    /////   Gestisce l'inserimento di nuove domande   /////


    public function question_validation(QuestionRequest $request)
    {
        
        if ($request->session()->missing('log')) {
            return redirect('/home');
        }

        session()->get('log');
        
        $validated = $request -> validate();

        Question::storeQuestion($validated);

        return redirect('/home')
                ->with('success', 'Domanda inserita correttamente');

    }

}
