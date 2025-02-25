<?php

namespace App\Livewire;

use App\Models\Aula;
use Livewire\Component;

class IndexAula extends Component
{
    public function render()
    {
        return view('livewire.index-aula', [
            'aulas' => Aula::all(),
        ])->layout('layouts.app');
    }
}
