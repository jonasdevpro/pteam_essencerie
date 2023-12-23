<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;

class CreateProduit extends Component
{
    public $nom = '';
    public $prix = '';
    public $quantite = '';
    public $stock_alert = '';

    public Produit $produit;

    public function mount(Produit $produit){
        $this->produit = $produit;

        $this->nom = $produit->nom;
        $this->prix = $produit->prix;
        $this->quantite =$produit->quantite;
        $this->stock_alert =$produit->stock_alert;
    }

    public function save(){

        $this->validate([
            'nom'=> 'required',
            'prix'=> 'required',
            'quantite'=> 'required',
            'stock_alert'=> 'required',
        ]);
        Produit::create([
            'nom' =>$this->nom,
            'prix' =>$this->prix,
            'quantite' =>$this->quantite,
            'stock_alert' =>$this->stock_alert,
        ]);
        session()->flash('success', 'Produit créé avec succès!');

         $this->redirect('/liste');
    }

    public function render()
    {
        return view('livewire.create-produit')->extends('layouts.app')->title('authentification');
    }

    public function modifier(Produit $produit){
        // $produit->update([
        //     'nom' => $this->nom,
        //     'reference' => $this->reference,
        // ]);

        $produit->update($this->only("nom", "prix","quantite","stock_alert"));
        $this->redirect('/liste');
        // $produit->update($this->all());
    }
}
