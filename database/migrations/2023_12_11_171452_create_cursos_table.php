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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100);
            $table->string('descripcion', 500);
            $table->string('img_path', 2048);
            $table->string('tipo', 100);
            $table->decimal('costo', 8, 2);
            $table->string('duracion', 45);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->string('estado', 45)->default('abierto'); //abierto - en progreso - culminado
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
