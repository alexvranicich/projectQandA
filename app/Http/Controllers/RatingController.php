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

        $user_id = $request->get('user_id');
        $answer_id = $request->get('answer_id');
        $rating = $request->get("rating");

        if (Rating::UserAlreadyRate($user_id, $answer_id))
        {
            echo json_encode(array('success' => 0));
        }
        else if (!Rating::ValidRatingInput($user_id, $answer_id, $rating))
        {
            echo json_encode(array('success' => 1));
        }
        else
        {
            return Rating::create([
                'user_id' => $user_id,
                'answer_id' => $answer_id,
                'rating' => $rating
            ]);
            echo json_encode(array('success' => 2));
        }
    }
}
