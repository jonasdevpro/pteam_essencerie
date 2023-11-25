<?php

namespace App\Livewire;

use Livewire\Component;

class Employe extends Component
{
    public function render()
    {
        return view('livewire.employe')->extends('layouts.app')->title('employers');
    }
}
