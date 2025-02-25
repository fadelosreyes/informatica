<?php

namespace App\Livewire;

use App\Models\Aula;
use Livewire\Component;

class CrearAula extends Component
{
    public $nombre;

    protected $rules = [
        'nombre' => 'required|string|max:255',
    ];

    public function crear()
    {
        $this->validate();

        Aula::create([
            'nombre' => $this->nombre,
        ]);

        session()->flash('message', 'Aula creada con éxito.');
        return redirect()->route('aulas-index');
    }

    public function render()
    {
        return view('livewire.crear-aula')->layout('layouts.app');
    }
}
