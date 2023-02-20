<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidat_formations', function (Blueprint $table) {
            $table->id();
            $table->integer("duree");
            $table->string("description");
            $table->boolean("isStarted");
            $table->date("dateDebut");
            $table->foreignId('candidat_id')->constrained();
            $table->foreignId('formation_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidat_formations');
    }
};
