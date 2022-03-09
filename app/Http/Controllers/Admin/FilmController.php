<?php

namespace App\Http\Controllers\Admin;

use App\Models\Film;
use App\Models\Kategorija;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class FilmController extends Controller
{
    public function adminfilmovi()
    {
        
        $filmovi = Film::all();
        return view('admin.film.index', compact('filmovi'));
    }

    public function dodaj()
    {
        $kategorija = Kategorija::all();
        return view('admin.film.dodaj', compact('kategorija'));
    }

    public function insert(Request $request)
    {
        $film = new Film();
        if ($request->hasFile('slika'))
        {
            $file = $request->file('slika');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/film', $filename);
            $film->slika = $filename;
        }

        $film->kategorija_id = $request->input('kategorija_id');
        $film->naslov = $request->input('naslov');
        $film->slug = $request->input('slug');
        $film->opis = $request->input('opis');
        $film->trailer = $request->input('trailer');
        $film->imdb_link = $request->input('imdb_link');
        $film->regularna_cijena = $request->input('regularna_cijena');
        $film->akcijska_cijena = $request->input('akcijska_cijena');
        $film->kolicina = $request->input('kolicina');
        $film->status = $request->input('status') == TRUE ? '1' : '0';
        $film->istaknut = $request->input('istaknut') == TRUE ? '1' : '0';
        $film->meta_title = $request->input('meta_title');
        $film->meta_keywords = $request->input('meta_keywords');
        $film->meta_description = $request->input('meta_description');
        $film->save();
        return redirect('/adminfilmovi')->with('status', 'Uspješno ste dodali novi film');
    }


    public function uredi($id)
    {
        $filmovi = Film::find($id);
        return view('admin.film.uredi', compact('filmovi'));
    }

    public function spremi(Request $request, $id)
    {
        $film = Film::find($id);
        if ($request->hasFile('slika'))
        {
            // brisemo sliku i dodajemo novu
            $path = 'assets/uploads/film/'. $film->slika;
            if (File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('slika');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/film', $filename);
            $film->slika = $filename;
        }

        $film->naslov = $request->input('naslov');
        $film->slug = $request->input('slug');
        $film->opis = $request->input('opis');
        $film->trailer = $request->input('trailer');
        $film->imdb_link = $request->input('imdb_link');
        $film->regularna_cijena = $request->input('regularna_cijena');
        $film->akcijska_cijena = $request->input('akcijska_cijena');
        $film->kolicina = $request->input('kolicina');
        $film->status = $request->input('status') == TRUE ? '1' : '0';
        $film->istaknut = $request->input('istaknut') == TRUE ? '1' : '0';
        $film->meta_title = $request->input('meta_title');
        $film->meta_keywords = $request->input('meta_keywords');
        $film->meta_description = $request->input('meta_description');
        $film->update();
        return redirect('/adminfilmovi')->with('status', 'Izmjena filma uspješno spremljena');
    }

    public function obrisi($id)
    {
        $film = Film::find($id);
        $path = 'assets/uploads/film/'. $film->slika;
        if (File::exists($path))
        {
            File::delete($path);
        }
        $film->delete();
        return redirect('adminfilmovi')->with('status', 'Film je uspješno obrisan');
    }
}
