<?php

namespace App\Livewire\Forms;

use App\Models\Pompe;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PumpForm extends Form
{
    #[Rule('required|string|max:245')]
    public $nom;

    #[Rule('required|boolean')]
    public $essence = false;

    #[Rule('required|boolean')]
    public $diesel = false;

    #[Rule('nullable|string')]
    public $description;

    #[Rule('required|uuid|exists:cuves,id')]
    public $cuve_id_essence;

    #[Rule('required|uuid|exists:cuves,id')]
    public $cuve_id_diesel;

    public function store()
    {
        $this->validate();

        $pump = Pompe::create(array_merge($this->all(), [
            'active' => 2,
            // 'gerant_id' => auth()->user()->id
        ]));
        session()->flash('success', "La pompe {$pump->nom} été creer avec succès");
    }

    public function update(Pompe $pump)
    {
        $this->validate();
        $pump->update($this->all());
        session()->flash('success', "La pompe {$pump->nom} été modifié avec succès");
    }

    public function enable(Pompe $pump)
    {
        if ($pump->active != 2) {
            $this->validate();
            $pump->update(['active' => 2]);
            session()->flash('success', "La pompe {$pump->nom} été activé avec succès");
        }
    }

    public function desable(Pompe $pump)
    {
        if ($pump->active != 3) {
            $this->validate();
            $pump->update(['active' => 3]);
            session()->flash('success', "La pompe {$pump->nom} été desactivé avec succès");
        }
    }

    public function delete(Pompe $pump)
    {
        if ($pump->active != 0) {
            $this->validate();
            $pump->update(['active' => 0]);
            session()->flash('success', "La pompe été supprimé avec succès");
        }
    }

    public function restor(Pompe $pump)
    {
        if ($pump->active != 1) {
            $this->validate();
            $pump->update(['active' => 1]);
            session()->flash('success', "La pompe été supprimé avec succès");
        }
    }

}
