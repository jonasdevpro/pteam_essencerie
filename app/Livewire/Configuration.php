<?php

namespace App\Livewire;

use App\Models\Configuration as ModelsConfiguration;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Configuration extends Component
{
    #[Rule("decimal:0|min:0")]
    public $prix_litre_essence = 0;

    #[Rule("decimal:0|min:0")]
    public $prix_litre_diesel = 0;

    #[Rule("string")]
    public $heure_debut_service_matin = '';

    #[Rule("string")]
    public $heure_fin_service_matin = '';

    #[Rule("string")]
    public $heure_debut_service_soir = '';

    #[Rule("string")]
    public $heure_fin_service_soir = '';

    private  ModelsConfiguration $conf;

    public function mount()
    {
        if (ModelsConfiguration::count() == 0) {
            $this->createConf();
        }else{
            $this->conf = ModelsConfiguration::first();
            $this->prix_litre_essence = $this->conf->prix_litre_essence;
            $this->prix_litre_diesel = $this->conf->prix_litre_diesel;
            $this->heure_debut_service_matin = $this->conf->heure_debut_service_matin;
            $this->heure_fin_service_matin = $this->conf->heure_fin_service_matin;
            $this->heure_debut_service_soir = $this->conf->heure_debut_service_soir;
            $this->heure_fin_service_soir = $this->conf->heure_fin_service_soir;
        }
    }

    public function createConf()
    {
        ModelsConfiguration::create($this->all());
    }

    public function render()
    {
        return view('livewire.configuration')->extends('layouts.app')->title('configuration général');
    }

    public function storeConf()
    {
        $this->validate();
        
        $conf = ModelsConfiguration::first();
        $conf->update($this->all());
        session()->flash('success', 'Configuration enregistré');
    }
}
