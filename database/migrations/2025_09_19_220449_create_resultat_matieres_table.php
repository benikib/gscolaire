<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('resultat_matieres', function (Blueprint $table) {
            $table->id();
            $table->float('moyenne');
            $table->string('appreciation');
            $table->string('bulletin_id');
            $table->string('matiere_id');

            $table->foreign('bulletin_id')->references('id')->on('bulletins');
            $table->foreign('matiere_id')->references('id')->on('matieres');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resultat_matieres');
    }
};
