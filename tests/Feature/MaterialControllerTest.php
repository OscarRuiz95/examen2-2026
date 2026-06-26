<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Categoria;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class MaterialControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function dadoUnMaterialQueNoExiste_insertarMaterial_funcionaCorrectamente()
    {
        // Crear una categoría
        $categoria = Categoria::create([
            'nombre' => 'Electrónicos'
        ]);

        // Datos del material
        $datos = [
            'descripcion' => 'Mouse Inalámbrico',
            'ubicacion' => 'Bodega A',
            'idCategoria' => $categoria->idCategoria
        ];

        // Llamar al endpoint
        $response = $this->postJson('/api/materiales', $datos);

        // Verificar que la respuesta sea 201 (Creado)
        $response->assertStatus(201);

        // Verificar que el material se guardó en la base de datos
        $this->assertDatabaseHas('materials', [
            'descripcion' => 'Mouse Inalámbrico',
            'ubicacion' => 'Bodega A',
            'idCategoria' => $categoria->idCategoria
        ]);
    }
} 