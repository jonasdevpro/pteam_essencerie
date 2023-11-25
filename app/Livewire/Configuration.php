<?php

namespace App\Livewire;

use Livewire\Component;

class Configuration extends Component
{
    public function render()
    {
        return view('livewire.configuration')->extends('layouts.app')->title('configuration');
    }
}
