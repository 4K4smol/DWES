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
        Schema::create('revisiones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('animal_id'); // Declaración de la columna clave foránea
            $table->foreign('animal_id')->references('id')->on('animales')->onDelete('cascade'); // Define la clave foránea            $table->date('fechaRevision');
            $table->date('fechaRevision');
            $table->string('descripcion');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisiones');
    }
};
