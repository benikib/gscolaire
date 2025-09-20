<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->float('valeur');
            $table->string('eleve_id');
            $table->string('evaluation_id');

            $table->foreign('eleve_id')->references('id')->on('utilisateurs');
            $table->foreign('evaluation_id')->references('id')->on('evaluations');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
