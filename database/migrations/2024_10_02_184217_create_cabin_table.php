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
        Schema::create('cabins', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->integer('capacity')->unsigned();
            $table->foreignId('cabinLevel_id'); //nivel FK
            $table->timestamps();

            //$table->foreign('cabinlevel_id')->references('id')->on('cabin_levels')->onUpdate('cascade');

            $table->foreign('cabinLevel_id')
                ->references('id')->on('cabin_levels')
                ->onUpdate('cascade')
                ->onUpdate('restrict')
                ->onDelete('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabins');
    }
};
