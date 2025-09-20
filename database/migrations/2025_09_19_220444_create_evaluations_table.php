<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('type');
            $table->string('libelle');
            $table->date('date');
            $table->float('coefficient');
            $table->string('classe_id');
            $table->string('matiere_id');
            $table->string('professeur_id');

            $table->foreign('classe_id')->references('id')->on('classes');
            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->foreign('professeur_id')->references('id')->on('utilisateurs');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluations');
    }
};
