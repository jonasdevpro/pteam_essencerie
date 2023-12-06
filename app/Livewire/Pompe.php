<?php

namespace App\Livewire;

use App\Models\Cuve;
use Livewire\Component;
use App\Traits\ModalTrait;
use Livewire\Attributes\Locked;
use App\Livewire\Forms\PumpForm;
use App\Models\Pompe as ModelsPompe;

class Pompe extends Component
{
    use ModalTrait;

    public PumpForm $form;

    #[Locked]
    public ModelsPompe $pump;

    public function render()
    {
        return view('livewire.pompe',[
            'fuelTanks' => $this->fuelTanksOptions(),
            'dieselTanks' => $this->dieselTanksOptions(),
            'pumps' => $this->getAllPumps()
        ])->extends('layouts.app')->title('configuration des pompes');
    }

    private function fuelTanksOptions(){
        $fuelTanks = Cuve::fuelTanks()->pluck('nom', 'id')->toArray();
        $defaultMessage = empty($fuelTanks) ? "Acunne cuve crée" : "Choissisé";
        $defaultOption = ["" => $defaultMessage];
        return array_merge($defaultOption, $fuelTanks);
    }
    private function dieselTanksOptions(){
        $dieselTanks = Cuve::dieselTanks()->pluck('nom', 'id')->toArray();
        $defaultMessage = empty($dieselTanks) ? "Acunne cuve crée" : "Choissisé";
        $defaultOption = ["" => $defaultMessage];
        return array_merge($defaultOption, $dieselTanks);
    }

    private function getAllPumps(){
        return ModelsPompe::AllPompes()->get();
    }

    public function store(){
        // dd($this->form);
        $this->form->store();
        $this->reset();
        $this->closeModal();
    }

    public function edit(ModelsPompe $pump)
    {
        $this->form->nom = $pump->nom;
        $this->form->essence = $pump->essence;
        $this->form->diesel = $pump->diesel;
        $this->form->description = $pump->description;
        $this->form->cuve_id_essence = $pump->cuve_id_essence;
        $this->form->cuve_id_diesel = $pump->cuve_id_diesel;
        $this->pump = $pump;
        $this->openModal('create-pump');
    }


    public function update()
    {
        $this->form->update($this->pump);
        $this->reset();
        $this->closeModal();
    }

    public function openModalWithParameter(string $modalName, ModelsPompe $pump){
        $this->openModal($modalName);
        $this->pump = $pump;
    }

    public function delete(ModelsPompe $pump){
        $pump->active = false;
        $pump->save();
        session()->flash('success','Pompe supprimé');
        $this->reset();
        $this->closeModal();
    }
}
