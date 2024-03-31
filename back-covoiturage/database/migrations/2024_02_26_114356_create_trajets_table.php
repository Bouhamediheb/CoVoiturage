<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  { {
      Schema::create(
        'trajets',
        function (Blueprint $table) {
          $table->id();
          $table->string('pointDepart');
          $table->string('pointArrive');
          $table->float('montant');
          $table->string('description');
          $table->integer('nbPlaces');
          $table->date('dateDepart');
          $table->unsignedBigInteger('idVoiture');
          $table->integer('etat')->default(-1);
          $table->foreign('idVoiture')
            ->references('id')
            ->on('voitures')
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
      );
    }
  }

  public function down(): void
  {
    Schema::dropIfExists('trajets');
  }
};