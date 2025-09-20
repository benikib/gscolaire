<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('matiere_professeur', function (Blueprint $table) {
           $table->string('matiere_id', 100);
$table->string('professeur_id', 100);
$table->timestamps();

$table->foreign('matiere_id')->references('id')->on('matieres')->onDelete('cascade');
$table->foreign('professeur_id')->references('id')->on('utilisateurs')->onDelete('cascade');

$table->unique(['matiere_id', 'professeur_id']);

        });
    }

    public function down()
    {
        Schema::dropIfExists('matiere_professeur');
    }
};
