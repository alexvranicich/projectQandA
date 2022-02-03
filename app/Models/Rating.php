<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'answer_id',
        'rating',
    ];

    public function oneAnswer(){
        return $this->hasOne('answers');
    }

    public function oneUser(){
        return $this->hasOne('users');
    }


    public static function UserAlreadyRate($user_id, $answer_id)
    {
        $check = DB::table('ratings')
                ->where('user_id', '=', $user_id)->where('answer_id', '=', "'$answer_id'", true)->get();
        return count($check) > 0;
    }


    ////    Calcolo del Rating Medio  ////

    public function AvgRating($answer_id)
    {
        $answers = Rating::where('answer_id', '=', "'$answer_id'")->get();

        if (is_array($answers)) {
            $count = count($answers);
            $sum = array_sum(array_column($answers, 'rating'));
        }

        //   Se non ci sono rating salvati ritorna 0  //

        if ($count === 0) {
            return 0;
        } else {
            return $sum / $count;
        }
    }

}
