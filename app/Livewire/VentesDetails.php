<?php

namespace App\Livewire;

use App\Models\Vente;
use Livewire\Component;

class VentesDetails extends Component
{   
    public $vente;
    
    public function mount($id)
    {
        $this->vente = Vente::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.ventes-details')->extends('layouts.app')->title('Details ventes');
    }
}