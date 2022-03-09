<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korpa extends Model
{
    use HasFactory;
    protected $table = 'korpa';
    protected $fillable = [
        'korisnik_id', 
        'film_id', 
        'film_rok'
    ];

    public function filmovi()
    {
        return $this->belongsTo(Film::class, 'film_id', 'id');
    }

}
