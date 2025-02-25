<?php

namespace App\Livewire;

use App\Models\Cambio;
use App\Models\Ordenador;
use Livewire\Component;

class DeleteCambio extends Component
{
    public $ordenador;
    public $dispositivo;

    public function mount($ordenadorId)
    {
        $this->ordenador = Ordenador::findOrFail($ordenadorId);
    }

    public function eliminar($cambioId)
    {
        $cambio = Cambio::findOrFail($cambioId);
        $cambio->delete();

        //$this->ordenador->load('cambios')
    }

    public function render()
    {
        return view('livewire.delete-cambio', [
            'cambios' => $this->ordenador
        ]);
    }
}
