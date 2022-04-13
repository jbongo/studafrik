<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
         
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('poste')->nullable();
            $table->string('cv')->nullable();
            $table->string('experience')->nullable();
            $table->string('date_naissance')->nullable();
            $table->string('raison_sociale')->nullable();
            $table->date('date_creation_entreprise')->nullable();
            $table->integer('nb_salarie')->nullable();
            $table->string('categorie')->nullable();
            $table->string('pays')->nullable();
            $table->string('pays_recherche')->nullable();
            $table->string('ville')->nullable();
            $table->string('description')->nullable();
            $table->string('contact1')->nullable();
            $table->string('contact2')->nullable();
            $table->string('email_contact')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('site_web')->nullable();
            $table->string('photo_profile')->nullable();
            $table->string('photo_couverture')->nullable();
            $table->boolean('profile_complete')->default(false);
            $table->boolean('accept_newsletter')->default(false);
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
