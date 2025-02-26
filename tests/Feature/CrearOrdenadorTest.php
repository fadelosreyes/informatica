<?php

namespace Tests\Feature;

use App\Livewire\CrearAula;
use App\Models\Aula;
use App\Models\User;
use Livewire\Livewire;

it('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('el usuario crea un ordenador correctamente', function () {

    $usuario = User::factory()->create();

    // Creamos un aula real con un nombre
    $aula = Aula::factory()->create();

    // Simulamos la petición
    $response = $this
        ->actingAs($usuario)
        ->from('/ordenadores/create')
        ->post('/ordenadores', [
            'marca' => 'Marca Prueba',
            'modelo' => 'Modelo Prueba',
            'aula' => $aula->nombre,
        ]);

    // Verificar que el ordenador fue creado correctamente en la base de datos
    $this->assertDatabaseHas('ordenadores', [
        'marca' => 'Marca Prueba',
        'modelo' => 'Modelo Prueba',
        'aula_id' => $aula->id, // Se asigna automáticamente en el controlador
    ]);

    // Verificar que el usuario está autenticado y que no hay errores
    $this->assertAuthenticated();
    $response->assertSessionHasNoErrors();
    $response->assertRedirect('/ordenadores'); // Asegurar que redirige correctamente
});

test('el usuario crea un aula correctamente', function () {
    $usuario = User::factory()->create();

    // Simula la autenticación del usuario
    $this->actingAs($usuario);

    // Crear el aula usando Livewire
    Livewire::test(CrearAula::class)
        ->set('nombre', 'p123') // Establece el valor del nombre
        ->call('crear'); // Llama al método 'crear'
    // Verifica que el aula fue creada correctamente en la base de datos
    $this->assertDatabaseHas('aulas', [
        'nombre' => 'p123',
    ]);
});

