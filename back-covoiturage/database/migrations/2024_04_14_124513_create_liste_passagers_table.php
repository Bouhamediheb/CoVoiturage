<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('liste_passagers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idTrajet');
            $table->foreign('idTrajet')
                ->references('id')
                ->on('trajets')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->unsignedBigInteger('idPassager');
            $table->foreign('idPassager')
                ->references('id')
                ->on('users')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liste_passagers');
    }
};
