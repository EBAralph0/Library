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
        Schema::create('groupe_emprunts', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Date de création du groupe d'emprunt
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('groupe_emprunts');
    }
};