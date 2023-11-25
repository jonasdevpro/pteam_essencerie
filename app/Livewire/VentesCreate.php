<?php

namespace App\Livewire;

use Livewire\Component;

class VentesCreate extends Component
{
    public function render()
    {
        return view('livewire.ventes-create')->extends('layouts.app')->title('Creer une ventes');
    }
}
