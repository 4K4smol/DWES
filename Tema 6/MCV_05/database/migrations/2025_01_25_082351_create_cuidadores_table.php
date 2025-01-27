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
            $table->string('slug')->unique();
            $table->unsignedBigInteger('id_titulacion1');
            $table->foreign('id_titulacion1')->references('id')->on('titulaciones')->onDelete('cascade');
            $table->unsignedBigInteger('id_titulacion2');
            $table->foreign('id_titulacion2')->references('id')->on('titulaciones')->onDelete('cascade');
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
