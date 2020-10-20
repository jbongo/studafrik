<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_experiences', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('titre')->nullable();
            $table->text('description')->nullable();
            $table->string('nom_entreprise')->nullable();
            $table->date('date_deb')->nullable();
            $table->date('date_fin')->nullable();
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
        Schema::dropIfExists('cv_experiences');
    }
}
