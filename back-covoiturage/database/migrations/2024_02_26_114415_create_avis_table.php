<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
  { {
      Schema::create(
        'avis',
        function (Blueprint $table) {
          $table->id();
          $table->string('commentaire');
          $table->integer('note');
          $table->unsignedBigInteger('idUser');
          $table->foreign('idUser')
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
    Schema::dropIfExists('avis');
  }
};