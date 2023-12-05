<?php

namespace App\Livewire;

use Livewire\Component;

class VentesCreate extends Component
{
    public $date_jour;

    public function mount()
    {
        $this->date_jour = now()->format('Y-m-d');
    }
    
    public function render()
    {
        return view('livewire.ventes-create')->extends('layouts.app')->title('Creer une ventes');
    }

}
