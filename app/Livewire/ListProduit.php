<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Url;

class ListProduit extends Component
{
    use WithPagination;

    public $search = '';
    public $produitIdToDelete;
    public $confirmingProduitDeletion = false;

    public function confirmProduitDeletion($produitId)
    {
        $this->produitIdToDelete = $produitId;
        $this->confirmingProduitDeletion = true;
    }

    public function cancelDeletion()
    {
        $this->confirmingProduitDeletion = false;
        $this->produitIdToDelete = null;
    }

    public function deleteProduit()
    {
        $produit = Produit::find($this->produitIdToDelete);
        if ($produit) {
            $produit->delete();
        }

        // Réinitialiser les propriétés après la suppression
        $this->produitIdToDelete = null;
        $this->confirmingProduitDeletion = false;
    }

    // public function render()
    // {
    //     $produits = Produit::where('nom', 'like', "%{$this->search}%")
    //         ->orWhere('prix', 'like', "%{$this->search}%")
    //         ->orderBy('created_at', 'asc')
    //         ->paginate(10);


    // public function Delete($produitId)
    // {
    //     $produit= Produit::find($produitId);
    //     if($produit)
    //     {
    //         $produit->delete();
    //     }

    // }


    // public function render()
    // {

    //     return view('livewire.list-produit', [
    //         'produits' => Produit::where('nom', 'like', "% {$this->search }%")
    //                 ->orWhere('prix', 'like', "% {$this->search }%")
    //                 ->orderBy('created_at', 'asc')
    //                 ->paginate(10)
    //     ])->extends('layouts.app')->title('authentification');
    // }


    public function render()
{
    $produits = Produit::where('nom', 'like', "%{$this->search}%")
        ->orWhere('prix', 'like', "%{$this->search}%")
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    // dd($produits);

    return view('livewire.list-produit', [
        'produits' => $produits,
    ])->extends('layouts.app')->title('authentification');
}


}
