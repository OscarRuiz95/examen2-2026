<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_unidads', function (Blueprint $table) {

            $table->id('idMaterialUnidad');

            $table->integer('cantidad');

            $table->foreignId('codigoMaterial')
                  ->constrained('materials', 'codigo')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreignId('idUnidad')
                  ->constrained('unidads', 'idUnidad')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->foreignId('codigoPresupuesto')
                  ->constrained('presupuestos', 'codigoPresupuesto')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_unidads');
    }
};