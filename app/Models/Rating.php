<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    public function answer(){
        return $this->hasOne(Answer::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }


    public static function ValidRatingInput(Request $request)
    {
        if ($request -> user_id !== '' || $request -> answer_id !== '' || $request-> rating !== '' || $request -> rating > 5.0  || $request->rating < 1.0)
            return true;
    }

    ////  Controlla se l'utente loggato ha già valutato la domanda  ////

    public static function UserAlreadyRate(Request $request)
    {
        $check = DB::table('ratings')
                ->where('user_id', '=',$request -> user_id)
                ->where('answer_id', '=', $request -> answer_id)
                ->get();

        return count($check) > 0;
    }

    ////    Salva Rating inserito  ////

    public static function storeRate(Request $request)
    {
        return Rating::create([
                    'user_id' => $request -> user_id,
                    'answer_id' => $request -> answer_id,
                    'rating' => $request -> rating
                ]);
    }

    ////   Aggiorna Rating   ////

    public static function updateRate(Request $request)
    {
        return DB::table('ratings')
                ->where('user_id', $request -> user_id)
                ->where('answer_id', $request -> answer_id)
                ->update(['rating' => $request-> rating]);
    }


    ////    Calcolo del Rating Medio   ////

    public static function AvgRating($answer_id)
    {
        $answers = DB::table('ratings')
                    ->where('answer_id', '=', $answer_id)
                    ->get();

        $avg = $answers->avg('rating');

        // Ritorna un solo decimale dopo la virgola //

        return number_format((float)$avg, 1, '.', '');

    }

}
