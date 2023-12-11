<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;

class CreateProduit extends Component
{
    public $nom = '';
    // public $reference = '';
    public $prix = '';
    public $quantite = '';
    public $stock_alert = '';

    public function save(){

        $this->validate([
            'nom'=> 'required',
            'reference'=> 'required',
            'prix'=> 'required',
            'quantite'=> 'required',
            'stock_alert'=> 'required',
        ]);
        Produit::create([
            'nom' =>$this->nom,
            'reference' =>$this->reference,
            'prix' =>$this->prix,
            'quantite' =>$this->quantite,
            'stock_alert' =>$this->stock_alert,
        ]);
        $this->redirect('/liste');
    }

    public function render()
    {
        return view('livewire.create-produit');
    }


}
