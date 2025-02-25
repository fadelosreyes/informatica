<?php

namespace App\Livewire;

use App\Models\Aula;
use Livewire\Component;

class EditAula extends Component
{
    public $aulaid;
    public $nombre;

    public function editar($aulaid)
    {
        $this->aulaid = $aulaid;
    }

    public function actualizar()
    {
        // Hace la actualización
        $aula = Aula::findOrFail($this->aulaid);
        $aula->fill([
            'nombre' => $this->nombre,
        ]);
        $aula->save();
        //$this->reset();

        session()->flash('message', 'Aula creada con éxito.');
        return redirect()->route('aulas-index');
    }

    public function render()
    {
        return view('livewire.edit-aula')->layout('layouts.app');
    }
}
