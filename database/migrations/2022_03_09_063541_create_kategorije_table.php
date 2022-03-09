<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategorijeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategorije', function (Blueprint $table) {
            $table->id();
            $table->string('naslov');
            $table->string('slug')->unique();
            $table->longText('opis');
            $table->string('slika');
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
        Schema::dropIfExists('kategorije');
    }
}
