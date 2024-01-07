<?php

namespace App\Livewire;

use App\Models\Vente;
use Livewire\Component;
use App\Models\VentesProduit;

class VentesDetails extends Component
{   
    public $vente;
    public $produitsVendus;
    
    public function mount($id)
    {
        $this->vente = Vente::findOrFail($id);
        $this->produitsVendus = VentesProduit::where('vente_id', $id)->get();
    }

    public function render()
    {
        return view('livewire.ventes-details')->extends('layouts.app')->title('Details ventes');
    }
}