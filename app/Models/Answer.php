<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'question_id',
        'content',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }

    public function question(){
        return $this->hasOne(Question::class);
    }

    public function manyRatings(){
        return $this->hasMany('ratings');
    }

    ////  Controlla che l'tente loggato non abbia già risposto  ////

    public static function userAlreadyAnswer($user_id, $question_id)
    {
        $check = DB::table('answers')
                    ->where('user_id', '=', $user_id)
                    ->where('question_id' , '=', $question_id)
                    ->get();

        return count($check)>0;
    }

    ////  Salva i dati delle risposte nel database  ////


    public static function storeAnswer(Request $request)
    {
        return Answer::create([
            'user_id' => Auth::user()->id,
            'question_id' => $request->question_id,
            'content' => $request->content,
        ]);
    }

    ////  Aggiorna la risposta  ////

    public static function updateAnswer(Request $request)
    {
        return DB::table('answers')
                ->where('user_id', Auth::user()->id)
                ->where('question_id', $request->question_id)
                ->update(['content' => $request->content]);
    }

    ////  Conta le risposte  ////

    public static function countAnswers()
    {
        return DB::table('questions')
                    ->join('answers', 'answers.question_id', '=' , 'questions.id')
                    ->select('answers.question_id')
                    ->groupBy('answers.question_id');
    }

}
