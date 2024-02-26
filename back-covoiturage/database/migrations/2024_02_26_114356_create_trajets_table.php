<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  {
    {Schema::create('Trajets', function (Blueprint $table)
       {$table->id();
        $table->string('pointDepart');
        $table->string('pointArrive');
        $table->float('montant');
        $table->string('description');
        $table->integer('nbPlaces');
        $table->date('dateDepart');
        $table->unsignedBigInteger('idVoiture');
        $table->foreign('idVoiture')
        ->references('id')
        ->on('voiture')
        ->onDelete('restrict')
        ->onUpdate('restrict');
        $table->unsignedBigInteger('idConducteur');
        $table->foreign('idConducteur')
        ->references('id')
        ->on('users')
        ->onDelete('restrict')
        ->onUpdate('restrict');

        $table->timestamps();







      }
      );}
  }

  public function down(): void{Schema::dropIfExists('trajet');}
};