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
        Schema::create('livres', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('auteur');
            $table->date('date_publication');
            $table->text('resume');
            $table->integer('pages');
            $table->integer('nombres_exemplaire_total');
            $table->integer('quantite_restant_stock');
            $table->integer('seuil_minimal_exemplaire');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('livres');
    }
};
