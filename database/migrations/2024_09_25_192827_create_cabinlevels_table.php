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
        Schema::create('cabin_levels', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 50)->unique(); //nombre
            $table->text('description')->nullable(); //descripcion  //>nullable() para que sea opcional
            $table->string('color', length: 6)->default('#FFFFFF');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabin_levels');
    }
};
