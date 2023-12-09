<?php

namespace App\Livewire;

use Livewire\Component;

class VentesDetails extends Component
{
    public function render()
    {
        return view('livewire.ventes-details')->extends('layouts.app')->title('Details ventes');
    }
}
