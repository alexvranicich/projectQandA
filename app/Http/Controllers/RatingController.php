<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Rating;


class RatingController extends Controller
{
    public function rating_js(Request $request)
    {

        if (Auth::guest()) {
            return redirect('/home');
        }

        $user_id = $request->user_id;
        $answer_id = $request->answer_id;
        $rating = $request->rating;

        if (Rating::UserAlreadyRate($user_id, $answer_id))
        {
            return response()->json(['success' => 'Hai già valutato a questa domanda']);
        }
        else if (!Rating::ValidRatingInput($user_id, $answer_id, $rating))
        {
            return response()->json(['success' => "Problema coi dati, riprova con un'altra domanda"]);
        }
        else
        {
            Rating::create([
                'user_id' => $user_id,
                'answer_id' => $answer_id,
                'rating' => $rating
            ]);
            return response()->json(['success' => 'Valutazione registrata con successo']);
        }
    }
}
