<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Configuration;

class VentesCreate extends Component
{

    public $indexDepartEssence;
    public $indexArriveEssence;
    public $indexDepartGazoile;
    public $indexArriveGazoile;
    // public $active;
    public $heureService;
    public $chefPisteId;
    public $pompisteId;
    public $pompeId;
    
    public $horaires;

    public function mount()
    {
        // Récupérer les horaires depuis la table Configuration
        $configurations = Configuration::first(); // Supposons qu'il y ait une seule entrée dans la table

        if ($configurations) {
            $this->horaires = [
                'matin' => $configurations->heure_debut_service_matin . ' - ' . $configurations->heure_fin_service_matin,
                'soir' => $configurations->heure_debut_service_soir . ' - ' . $configurations->heure_fin_service_soir,
            ];
        } else {
            // Valeurs par défaut si $configurations est null
            $this->horaires = [
                'matin' => '00:00 - 00:00',
                'soir' => '00:00 - 00:00',
            ];
        }
    }
    
    public function saveVente()
    {
        $valide = $this->validate([
            'heureService' =>'required',
            'chefPisteId' =>'required',
            'pompisteId' =>'required',
            'pompeId' =>'required',
        ]);
        Ventes::create($valide);
    }

    public function render()
    {
        return view('livewire.ventes-create')->extends('layouts.app')->title('Creer une ventes');
    }

}
