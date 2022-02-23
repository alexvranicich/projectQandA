<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'content',
    ];

    public function user(){
        return $this -> hasOne(User::class);
    }

    public function answers(){
        return $this -> hasMany(Answer::class);
    }

    ///  Tramite join listo le risposte e i loro rispettivi autori  ///

    public static function listQuestions()
    {
        return DB::table('questions')
                ->join('users', 'users.id', '=', 'questions.user_id')
                ->select('questions.id','questions.title', 'questions.user_id','questions.content','users.name')
                ->orderBy('questions.id')
                ->paginate(3);
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


    public static function searchQuestion(Request $request)
    {
        return DB::table('questions')
                ->where('title', 'LIKE', "%{$request -> search}%")
                ->orWhere('content', 'LIKE', "%{$request -> search}%")
                ->select('questions.id', 'questions.title', 'questions.user_id', 'questions.content', 'users.name')
                ->orderBy('questions.id')
                ->paginate(3);
    }
}
