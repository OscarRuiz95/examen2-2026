<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requisicions', function (Blueprint $table) {

            $table->id('idRequisicion');

            $table->date('fecha');

            $table->string('estado');

            $table->foreignId('idUsuario')
                  ->constrained('usuarios', 'idUsuario')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requisicions');
    }
};
