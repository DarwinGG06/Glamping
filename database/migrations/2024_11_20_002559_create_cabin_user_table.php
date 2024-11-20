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
        Schema::create('cabin_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('cabin_id'); // Clave foránea para cabañas
            $table->foreignId('user_id'); // Clave foránea para usuarios

            // Definir las relaciones
            $table->foreign('cabin_id')->references('id')->on('cabins')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            // Evitar duplicados
            $table->unique(['cabin_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabin_user');
    }
};
