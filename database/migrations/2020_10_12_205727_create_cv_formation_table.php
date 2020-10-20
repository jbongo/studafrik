<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCvFormationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_formations', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('libelle')->nullable();
            $table->text('description')->nullable();
            $table->string('ets')->nullable();
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
        Schema::dropIfExists('cv_formations');
    }
}
