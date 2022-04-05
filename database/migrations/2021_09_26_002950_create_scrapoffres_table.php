<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScrapoffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scrapoffres', function (Blueprint $table) {
            $table->id();
            $table->text('titre')->nullable();
            $table->text('annonce')->nullable();
            $table->text('url')->nullable();
            $table->string('site')->nullable();
            $table->string('pays')->nullable();
            $table->string('nom_entreprise')->nullable();
            $table->text('logo_entreprise')->nullable();
            // 0 = non ajoutée, 1= ajoutée en tant que offre, 2 = refusée
            $table->boolean('statut')->default(0);

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
        Schema::dropIfExists('scrapoffres');
    }
}
