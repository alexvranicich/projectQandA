<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Http\Requests\QuestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    public function OneUser(){
        return $this -> hasOne('users');
    }

    public function ManyAnswers(){
        return $this -> hasMany('answers');
    }

    ///  Tramite join listo le risposte e i loro rispettivi autori  ///

    public static function list_questions()
    {
        return DB::table('questions')
                ->join('users', 'users.id', '=', 'questions.user_id')
                ->select('questions.id', 'users.name', 'questions.title', 'questions.content')
                ->get();
    }

    ///  Salva i dati della domanda nel database  ///

    public static function storeQuestion(Request $request)
    {
        return Question::create([
            'user_id' => Auth::user()->id,
            'title' => $request -> title,
            'content' => $request -> content,
        ]);
    }
}
