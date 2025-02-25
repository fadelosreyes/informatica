<?php

namespace App\Livewire;

use App\Models\Aula;
use Livewire\Component;

class ShowAula extends Component
{
    public $aula;
    public $aulaid;

    public function mount($aulaid)
    {
        $this->aulaid = $aulaid;
        $this->aula = Aula::findOrFail($aulaid);
    }

    public function render()
    {
        return view('livewire.show-aula',
            [
                'aula' => $this->aula,
            ]
        )->layout('layouts.app');;
    }
}
