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

        if (Rating::UserAlreadyRate($request))
        {
            Rating::updateRate($request);
            return response()->json(['success' => 'Valutazione aggiornata']);
        }

        else if (!Rating::ValidRatingInput($request))
        {
            return response()->json(['success' => "Problema coi dati, riprova con un'altra domanda"]);
        }
        else
        {
            Rating::storeRate($request);
            return response()->json(['success' => 'Valutazione registrata con successo']);
        }
    }
}
