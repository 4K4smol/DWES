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
        Schema::create('cuidadores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('titulo1_id')->nullable();
            $table->foreign('titulo1_id')->references('id')->on('titulos')->onDelete('cascade');
            $table->unsignedBigInteger('titulo2_id')->nullable();
            $table->foreign('titulo2_id')->references('id')->on('titulos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuidadores');
    }
};
