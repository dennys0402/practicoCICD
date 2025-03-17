<?php

namespace Tests\Feature;

use App\Models\Empleado;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmpleadoTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_listar_empleados()
    {
        Empleado::factory()->count(5)->create();

        $response = $this->get('/empleados');
        $response->assertStatus(200);
        $response->assertSeeText('Lista de Empleados');
    }

    /** @test */
    public function puede_crear_un_empleado()
    {
        $data = [
            'nombres' => 'Juan',
            'apellidos' => 'Perez',
            'puesto' => 'Gerente',
            'fecha_contratacion' => '2023-01-15',
            'salario' => 3000.50,
            'email' => 'juanperez@example.com',
            'telefono' => '123456789',
            'departamento' => 'Administración',
        ];

        $response = $this->post('/empleados', $data);

        $response->assertRedirect('/empleados');
        $this->assertDatabaseHas('empleados', $data);
    }

    /** @test */
    public function puede_editar_un_empleado()
    {
        $empleado = Empleado::factory()->create();

        $nuevosDatos = [
            'nombres' => 'Carlos',
            'apellidos' => 'Lopez',
            'puesto' => 'Director',
            'fecha_contratacion' => '2022-05-10',
            'salario' => 4000.00,
            'email' => 'carloslopez@example.com',
            'telefono' => '987654321',
            'departamento' => 'Finanzas',
        ];

        $response = $this->put("/empleados/{$empleado->id}", $nuevosDatos);

        $response->assertRedirect('/empleados');
        $this->assertDatabaseHas('empleados', $nuevosDatos);
    }

    /** @test */
    public function puede_eliminar_un_empleado()
    {
        $empleado = Empleado::factory()->create();

        $response = $this->delete("/empleados/{$empleado->id}");

        $response->assertRedirect('/empleados');
        $this->assertDatabaseMissing('empleados', ['id' => $empleado->id]);
    }
}
