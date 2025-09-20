<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->date('date_envoi');
            $table->text('contenu');
            $table->boolean('statut_envoi')->default(false);
            $table->string('parent_id');
            $table->unsignedBigInteger('service_notification_id');

            $table->foreign('parent_id')->references('id')->on('utilisateurs');
            $table->foreign('service_notification_id')->references('id')->on('service_notifications');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
    }
};
