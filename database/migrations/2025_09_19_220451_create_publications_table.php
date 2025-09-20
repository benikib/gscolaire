<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->date('date_publication');
            $table->enum('statut', ['brouillon', 'valide', 'publie']);
            $table->string('administrateur_id');

            $table->foreign('administrateur_id')->references('id')->on('utilisateurs');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('publications');
    }
};
