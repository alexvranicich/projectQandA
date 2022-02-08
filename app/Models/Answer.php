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

    public function oneUser(){
        return $this->hasOne('users');
    }

    public function oneQuestion(){
        return $this->hasOne('questions');
    }

    public function manyRatings(){
        return $this->hasMany('ratings');
    }


    public static function userAlreadyAnswer($user_id, $question_id)
    {
        $check = DB::table('answers')
                    ->where('user_id', '=', $user_id)
                    ->where('question_id' , '=', $question_id)
                    ->get();

        return count($check)>0;
    }


    public static function storeAnswer(Request $request)
    {
        return Answer::create([
            'user_id' => Auth::user()->id,
            'question_id' => $request->question_id,
            'content' => $request->content,
        ]);
    }

    public static function updateAnswer(Request $request)
    {
        return DB::table('answers')
                ->where('user_id', Auth::user()->id)
                ->update(['content' => $request->content]);
    }

}
