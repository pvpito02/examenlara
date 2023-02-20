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
        Schema::create('formation_references', function (Blueprint $table) {
            $table->id();
            $table->boolean("validated");
            $table->float("horaire");
            $table->foreignId('reference_id')->constrained();
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
        Schema::dropIfExists('formation_references');
    }
};
