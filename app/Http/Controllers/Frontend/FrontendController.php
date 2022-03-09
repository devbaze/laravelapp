<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Kategorija;

class FrontendController extends Controller
{
    public function index()
    {
        $istaknuti_filmovi = Film::where('istaknut', '1')->orderBy('created_at', 'desc')->take(15)->get();
        $istaknute_kategorije = Kategorija::where('istaknut', '1')->orderBy('created_at', 'desc')->take(15)->get();
        return view('frontend.index', compact('istaknuti_filmovi', 'istaknute_kategorije'));
    }

    public function kategorije()
    {
        $kategorije = Kategorija::where('status', '0')->get();
        return view('frontend.kategorije', compact('kategorije'));
    }

    public function pregledkategorije($slug)
    {
        if(Kategorija::where('slug', $slug)->exists())
        {
            $kategorija = Kategorija::where('slug', $slug)->first();
            $filmovi = Film::where('kategorija_id', $kategorija->id)->where('status', '0')->get();
            return view('frontend.filmovi.index', compact('kategorija', 'filmovi'));
        }
        else
        {
            return redirect('/')->with('status', 'Kategorija ne postoji!');
        }
    }

    public function pregledfilma($kategorija_slug, $film_slug)
    {
        if(Kategorija::where('slug', $kategorija_slug)->exists())
        {
            if(Film::where('slug', $film_slug)->exists())
            { 
                

                $film = Film::where('slug', $film_slug)->first();
                return view('frontend.filmovi.pregled', compact('film'));
            }
            else
            {
                return redirect('/')->with('status', 'Film ne postoji!');
            }
        }
        else
        {
            return redirect('/')->with('status', 'Kategorija ne postoji!');
        }
    }

}
