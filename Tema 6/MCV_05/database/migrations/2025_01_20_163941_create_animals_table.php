<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animales', function (Blueprint $table) {
            $table->id();
            $table->string('especie')->unique();
            $table->string('slug')->unique();
            $table->double('peso', 6, 1);
            $table->double('altura', 6, 1);
            $table->date('fechaNacimiento');
            $table->string('alimentacion', 20)->nullable()->collation('utf8mb4_unicode_ci');
            $table->text('descripcion')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
