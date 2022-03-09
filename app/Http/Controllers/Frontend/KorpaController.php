<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Korpa;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;

class KorpaController extends Controller
{

    public function dodajFilm(Request $request)
    {
        $film_id = $request->input('film_id');
        $film_rok = $request->input('film_rok');

        if(Auth::check())
        {
            $film_provjera = Film::where('id', $film_id)->first();

            if($film_provjera)
            {
                if(Korpa::where('film_id', $film_id)->where('korisnik_id', Auth::id())->exists())
                {
                    return response()->json(['status' => $film_provjera->naslov." je već dodan u korpu!"]);
                }
                else
                {
                    $korpaFilm = new Korpa();
                    $korpaFilm->film_id = $film_id;
                    $korpaFilm->korisnik_id = Auth::id();
                    $korpaFilm->film_rok = $film_rok;
                    $korpaFilm->save();
                    return response()->json(['success' => $film_provjera->naslov." Film je dodan u korpu!"]);
                }
            }
        }
        else {
            return response()->json(['status', "Morate biti ulogovani da bi dodali film u korpu!"]);
        }
    }

    public function pogledaj()
    {
        $korpafilmovi = Korpa::where('korisnik_id', Auth::id())->get();
        return view('frontend.korpa', compact('korpafilmovi'));
    }

    public function obrisifilm(Request $request)
    {
        

        if(Auth::check())
        {
            $film_id = $request->input('film_id');
            if(Korpa::where('film_id', $film_id)->where('korisnik_id', Auth::id())->exists())
            {
                $korpaFilm = Korpa::where('film_id', $film_id)->where('korisnik_id', Auth::id())->first();
                $korpaFilm->delete();
                return response()->json(['status' => "Film je uspješno obrisan iz korpe!"]);
            }
        }
        else {
            return response()->json(['status', "Morate biti ulogovani da bi dodali film u korpu!"]);
        }
    }

}
