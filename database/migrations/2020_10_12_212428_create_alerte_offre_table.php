<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlerteOffreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerte_offre', function (Blueprint $table) {
            $table->id();
            $table->integer('categorie_offre_id')->nullable();
            $table->string('titre')->nullable();
            $table->string('mot_recherche')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();

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
        Schema::dropIfExists('alerte_offre');
    }
}
