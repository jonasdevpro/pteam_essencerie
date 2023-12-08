<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Cuve;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;

class fuelTankForm extends Form
{
    #[Rule('required|string|max:245')]
    public $nom = '';

    #[Rule('required|integer|min:0')]
    public $capacite = 0;

    #[Rule('required|string|max:245|in:essence,diesel')]
    public $contenu =  '';

    #[Rule('nullable|string')]
    public $description = '';

    public function store(){
        $this->validate();
        $fuelTank = Cuve::create(array_merge($this->all(), [
            'active' => true,
            // 'gerant_id' => auth()->user()->id
        ]));
        session()->flash('success', "La cuve {$fuelTank->nom} été creer avec succès");
    }

    public function update(Cuve $fuelTank){
        $this->validate();
        $fuelTank->update($this->all());
        session()->flash('success', "La cuve {$fuelTank->nom} été modifié avec succès");
    }
}
