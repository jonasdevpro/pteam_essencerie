<?php

namespace App\Livewire;

use Livewire\Component;

class VentesListe extends Component
{
    public function render()
    {
        return view('livewire.ventes-liste')->extends('layouts.app')->title('Listes ventes');
    }
}
