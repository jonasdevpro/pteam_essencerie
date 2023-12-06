<?php

namespace App\Livewire;

use Livewire\Component;
use App\Traits\ModalTrait;
use Illuminate\Support\Str;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Locked;
use App\Models\Cuve as ModelCuve;
use App\Livewire\Forms\fuelTankForm;

class Cuve extends Component
{
    use ModalTrait;
    // Modal -> create-tank,confirmDelete-tank, show-tank


    public fuelTankForm $form;

    #[Locked]
    public ?ModelCuve $tank = null;


    public function render()
    {
        return view('livewire.cuve', [
            'tanks' => $this->getTanks()
        ])->extends('layouts.app')->title('configuration des cuves');
    }



    public function openModalWithParameter(string $modalName, ModelCuve $tank){
        $this->openModal($modalName);
        $this->tank = $tank;
    }


    public function store()
    {
        $this->form->store();
        $this->reset();
        $this->closeModal();
    }

    private function getTanks()
    {
        return ModelCuve::orderBy("created_at", 'desc')
        ->where('active', true)
        ->get();
    }

    public function edit(ModelCuve $tank)
    {
        $this->form->nom = $tank->nom;
        $this->form->capacite = $tank->capacite;
        $this->form->contenu = $tank->contenu;
        $this->form->description = $tank->description;
        $this->tank = $tank;
        $this->openModal('create-tank');
    }

    public function update()
    {
        $this->form->update($this->tank);
        $this->reset();
        $this->closeModal();
    }

    public function delete(ModelCuve $tank){
        $tank->active = false;
        $tank->save();
        session()->flash('success','Cuve supprimé');
        $this->reset();
        $this->closeModal();
    }
}
