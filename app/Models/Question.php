<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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


    public static function list_questions()
    {
        return DB::table('questions')
                ->join('users', 'users.id', '=', 'questions.user_id')
                ->select('questions.id', 'users.email', 'questions.title', 'questions.content')
                ->get();
    }

    public static function storeQuestion(array $data)
    {
        return Question::create([
            'user_id' => session()->get('log'),
            'title' => $data['title'],
            'content' => $data['content'],
        ]);
    }




}
