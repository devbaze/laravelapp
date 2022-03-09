<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategorija;
use Illuminate\Support\Facades\File;

class KategorijaController extends Controller
{
    public function adminkategorije()
    {
        $kategorije = Kategorija::all();
        return view('admin.kategorija.index', compact('kategorije'));
    }

    public function dodajkategoriju()
    {
        return view('admin.kategorija.dodaj');
    }

    public function insertkategoriju(Request $request)
    {
        $kategorija = new Kategorija();
        if ($request->hasFile('slika'))
        {
            $file = $request->file('slika');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/kategorija', $filename);
            $kategorija->slika = $filename;
        }

        $kategorija->naslov = $request->input('naslov');
        $kategorija->slug = $request->input('slug');
        $kategorija->status = $request->input('status') == TRUE ? '1' : '0';
        $kategorija->istaknut = $request->input('istaknut') == TRUE ? '1' : '0';
        $kategorija->opis = $request->input('opis');
        $kategorija->meta_title = $request->input('meta_title');
        $kategorija->meta_keywords = $request->input('meta_keywords');
        $kategorija->meta_description = $request->input('meta_description');
        $kategorija->save();
        return redirect('/adminkategorije')->with('status', 'Uspješno ste dodali novu kategoriju');
    }

    public function uredikategoriju($id)
    {
        $kategorija = Kategorija::find($id);
        return view('admin.kategorija.uredi', compact('kategorija'));
    }

    public function spremikategoriju(Request $request, $id)
    {
        $kategorija = Kategorija::find($id);
        if ($request->hasFile('slika'))
        {
            // brisemo sliku i dodajemo novu
            $path = 'assets/uploads/kategorija/'. $kategorija->slika;
            if (File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('slika');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/kategorija', $filename);
            $kategorija->slika = $filename;
        }
        
        $kategorija->naslov = $request->input('naslov');
        $kategorija->slug = $request->input('slug');
        $kategorija->status = $request->input('status') == TRUE ? '1' : '0';
        $kategorija->istaknut = $request->input('istaknut') == TRUE ? '1' : '0';
        $kategorija->opis = $request->input('opis');
        $kategorija->meta_title = $request->input('meta_title');
        $kategorija->meta_keywords = $request->input('meta_keywords');
        $kategorija->meta_description = $request->input('meta_description');
        $kategorija->update();
        return redirect('/adminkategorije')->with('status', 'Izmjena kategorije uspješno spremljena');
    }

    public function obrisikategoriju($id)
    {
        $kategorija = Kategorija::find($id);
        if ($kategorija->slika)
        {
            $path = 'assets/uploads/kategorija/'. $kategorija->slika;
            if (File::exists($path))
            {
                File::delete($path);
            }
        }
        $kategorija->delete();
        return redirect('adminkategorije')->with('status', 'Kategorija je uspješno obrisana');
    }
}