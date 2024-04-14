<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voitures', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->integer('annee');
            $table->string('matricule');
            $table->boolean('climatisation');
            $table->boolean('animaux');
            $table->boolean('fumeur');
            $table->boolean('baggage');
            $table->boolean('bebe');
            $table->unsignedBigInteger('idConducteur');
            $table->foreign('idConducteur')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voitures');
    }
};