<?php

namespace App\Livewire;

use App\Models\Produit;
use Livewire\Component;

class CreateProduit extends Component
{
    public $nom = '';
    public $prix = '';
    public $stock = '';
    public $stock_alert = '';

    public Produit $produit;

    public function mount(Produit $produit){
        $this->produit = $produit;

        $this->nom = $produit->nom;
        $this->prix = $produit->prix;
        $this->stock =$produit->stock;
        $this->stock_alert =$produit->stock_alert;
    }

    public function save(){

        $this->validate([
            'nom'=> 'required|string|min:3,max:20',
            'prix'=> 'required|numeric|min:2',
            'stock'=> 'required|integer|min:1',
            'stock_alert'=> 'required|integer|min:1',
        ]);
        Produit::create([
            'nom' =>$this->nom,
            'prix' =>$this->prix,
            'stock' =>$this->stock,
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

        $produit->update($this->only("nom", "prix","stock","stock_alert"));

            session()->flash('success', 'Produit modifier avec succès!');
            
        $this->redirect('/liste');
        // $produit->update($this->all());
    }
}