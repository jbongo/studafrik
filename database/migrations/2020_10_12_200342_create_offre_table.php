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
            $table->text('titre')->nullable();
            $table->text('slug')->nullable();
            $table->string('nom_entreprise')->nullable();
            $table->text('description')->nullable();
            $table->string('type_contrat')->nullable();
            $table->text('description_profil')->nullable();
            $table->string('sexe')->nullable();
            $table->string('devise_salaire')->nullable();
            $table->integer('salaire')->nullable();
            $table->integer('experience')->nullable();
            $table->text('competence_requise')->nullable();
            $table->string('pays')->nullable();
            $table->string('ville')->nullable();
            $table->date('date_expiration')->nullable();
            $table->text('message_candidature')->nullable();
            $table->string('candidater_lien')->default("Non");
            $table->string('url_candidature')->nullable();
            
            $table->boolean('active')->default(true);
            $table->boolean('archive')->default(false);

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
