<?php

namespace App\Livewire;

use Livewire\Component;

class Station extends Component
{
    public function render()
    {
        return view('livewire.station')->extends('layouts.app')->title('profile');
    }
}