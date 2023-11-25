<?php

namespace App\Livewire;

use Livewire\Component;

class Connexion extends Component
{
    public function render()
    {
        return view('livewire.connexion')->extends('layouts.app')->title('authentification');
    }
}
