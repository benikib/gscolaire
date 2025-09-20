<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('bulletins', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->integer('periode');
            $table->datetime('date_generation');
            $table->string('eleve_id');
            $table->string('statut_publication_id')->default('brouillon');
            $table->datetime('date_validation')->nullable();
            $table->datetime('date_publication')->nullable();
            $table->datetime('date_retrait')->nullable();

            $table->foreign('eleve_id')->references('id')->on('utilisateurs');
            $table->foreign('statut_publication_id')->references('id')->on('statut_publications');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('bulletins');
    }
};
