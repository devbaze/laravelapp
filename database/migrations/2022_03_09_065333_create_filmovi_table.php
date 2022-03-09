<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilmoviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filmovi', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('kategorija_id');
            $table->string('naslov');
            $table->string('slug')->unique();
            $table->longText('opis');
            $table->string('trailer');
            $table->string('slika');
            $table->string('imdb_link');
            $table->string('regularna_cijena');
            $table->string('akcijska_cijena')->nullable();
            $table->string('kolicina')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('istaknut')->default('0');
            $table->string('meta_title')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filmovi');
    }
}
