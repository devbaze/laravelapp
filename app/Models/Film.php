<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'filmovi';
    protected $fillable = [
        'kategorija_id', 
        'naslov', 
        'slug', 
        'opis', 
        'trailer', 
        'slika', 
        'imdb_link', 
        'regularna_cijena', 
        'akcijska_cijena', 
        'kolicina', 
        'status', 
        'istaknut', 
        'meta_title', 
        'meta_keywords', 
        'meta_description'
    ];

    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class, 'kategorija_id', 'id');
    }
}
