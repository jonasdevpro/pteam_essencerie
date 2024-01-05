<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;

class ListProduit extends Component
{
    public function DeleteProduit($produitId)
    {
        $produit= Produit::find($produitId);
        if($produit)
        {
            $produit->delete();

        }

    }

    public function render()
    {
        return view('livewire.list-produit', [
            'produits' => Produit::paginate(10),
        ]);
    }
}