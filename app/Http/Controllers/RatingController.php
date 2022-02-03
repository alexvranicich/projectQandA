<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Rating;


class RatingController extends Controller
{
    public function rating(Request $request)
    {

        if (Auth::guest()) {
            return redirect('/home');
        }

        $user_id = $request->request->get('id_user');
        $answer_id = $request->request->get('id_answer');
        $rating = $request->request->get("rating");

        if (Rating::UserAlreadyRate($user_id, $answer_id)) {
            echo json_encode(array('success' => 0));
        } else if (!Rating::NotNull($user_id, $answer_id, $rating)) {
            echo json_encode(array('success' => 1));
        } else {
            $data = Rating::create([
                'user_id' => $user_id,
                'answer_id' => $answer_id,
                'rating' => $rating
            ]);
            echo json_encode(array('success' => 2));
        }
    }
}
