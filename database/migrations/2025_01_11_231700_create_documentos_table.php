<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->date('fecha');
            
            // Relación con la tabla tipo
            $table->foreignId('tipo_id')
                  ->constrained('tipo')
                  ->onDelete('cascade');
            
            // Relación con la tabla área
            $table->foreignId('area_id')
                  ->constrained('area')
                  ->onDelete('cascade');
            
            $table->string('url');
            
            // Estado como enum
            $table->enum('estado', ['activo', 'inactivo'])->default('activo');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
