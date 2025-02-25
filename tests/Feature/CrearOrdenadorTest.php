<?php

namespace Tests\Feature;

use App\Models\User;

it('example', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('el usuario crea un ordenador correctamente', function () {
    $usuario = User::factory()->create();

    $response = $this
        ->actingAs($usuario)
        ->from('/d/create')
        ->post('/peliculas', [
            'director' => 'Director de prueba',
            'titulo' => 'Título de prueba',
            'descripcion' => 'Descripción de prueba',
            'duracion' => 120,
        ]);

    $this->assertAuthenticated();

    $this->assertDatabaseHas('peliculas', [
        'director' => 'Director de prueba',
        'duracion' => 120,
    ]);

    $response->assertSessionHasNoErrors();
    $response->assertRedirect('/peliculas');
});
