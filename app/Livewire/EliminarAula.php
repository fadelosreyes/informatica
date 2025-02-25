<?php

namespace App\Livewire;

use App\Models\Aula;
use Livewire\Component;

class EliminarAula extends Component
{
    public $aula;
    public $aulaid;

    public function mount($aulaid)
    {
        $this->aula = Aula::find($aulaid);

    }
    public function eliminar($aulaid)
    {
        $aula = Aula::findOrFail($aulaid);
        $aula->delete();

        session()->flash('message', 'Aula eliminada con éxito.');
        return redirect()->route('aulas-index');
    }

    public function render()
    {
        return view('livewire.eliminar-aula')->layout('layouts.app');;
    }
}
