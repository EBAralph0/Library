<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('emprunts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('groupe_emprunt_id')->constrained('groupe_emprunts')->onDelete('cascade');
            $table->foreignId('livre_id')->constrained('livres')->onDelete('cascade');
            $table->foreignId('membre_id')->constrained('membres')->onDelete('cascade');
            $table->dateTime('date_heure_emprunt');
            $table->dateTime('date_limite_remise');
            $table->boolean('statut')->default(false); // False = non rendu, True = rendu
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('emprunts');
    }
};
