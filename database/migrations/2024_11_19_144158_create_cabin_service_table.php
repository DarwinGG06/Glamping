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
        Schema::create('cabin_service', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->timestamps();
            $table->foreignId('cabin_id'); // Clave foránea para cabañas
            $table->foreignId('service_id'); // Clave foránea para servicios

            // Definir las relaciones
            $table->foreign('cabin_id')->references('id')->on('cabins')->unUpdate('cascade');
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('cascade');

            // Evitar duplicados
            $table->unique(['cabin_id', 'service_id']);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabin_service');
    }
};
