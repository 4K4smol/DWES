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
        Schema::create('animales_cuidadores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id');
            $table->foreign('animal_id')->references('id')->on('animales')->ondelete('cascade');
            $table->unsignedBigInteger('cuidador_id');
            $table->foreign('cuidador_id')->references('id')->on('cuidadores')->ondelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animales_cuidadores');
    }
};
