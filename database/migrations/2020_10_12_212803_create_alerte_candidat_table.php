<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlerteCandidatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alerte_candidats', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->nullable();
            $table->string('poste')->nullable();
            $table->text('competences')->nullable();
            $table->string('sexe')->nullable();
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
        Schema::dropIfExists('alerte_candidats');
    }
}
