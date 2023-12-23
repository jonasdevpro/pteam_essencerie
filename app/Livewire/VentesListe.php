<?php

namespace App\Livewire;

use App\Models\Vente;
use Livewire\Component;

class VentesListe extends Component
{   
    public $ventes;
    
    public function mount()
    {
        $this->listesVentes();
    }

    public function listesVentes()
    {
        $this->ventes = Vente::latest('created_at')->get();
    }

    public function render()
    {
        return view('livewire.ventes-liste')->extends('layouts.app')->title('Listes ventes');
    }
}