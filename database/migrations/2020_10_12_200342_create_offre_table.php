<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offres', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->integer('categorieoffre_id')->nullable();
            $table->string('titre')->nullable();
            $table->text('description')->nullable();
            $table->string('type_contrat')->nullable();
            $table->text('description_profil')->nullable();
            $table->string('sexe')->nullable();
            $table->integer('salaire_min')->nullable();
            $table->integer('salaire_max')->nullable();
            $table->integer('experience_min')->nullable();
            $table->integer('experience_max')->nullable();
            $table->text('competence_requise')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->date('date_expiration')->nullable();
            $table->text('message_candidature')->nullable();
            
            
            $table->boolean('active')->default(true);

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
        Schema::dropIfExists('offres');
    }
}
