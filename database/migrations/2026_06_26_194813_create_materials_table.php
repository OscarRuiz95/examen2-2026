<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {

            $table->id('codigo');

            $table->string('descripcion'); //descripcion del material

            $table->string('ubicacion');

            $table->foreignId('idCategoria')
                  ->constrained('categorias', 'idCategoria')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};