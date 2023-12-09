<?php

namespace App\Livewire;

use App\Models\Pompe;
use Livewire\Component;
use App\Models\Configuration;

class VentesCreate extends Component
{

    public $index_depart_essence;
    public $index_arrive_essence;

    public $qte_essence;
    public $prix_essence;


    public $index_depart_gazoile;
    public $index_arrive_gazoile;
    // public $active;
    public $heureService;
    public $chefPisteId;
    public $pompisteId;
    public $pompeId;
    

    public $lubrifiant_vendu = 0;
    public $gaz_vendu = 0;

    public $horaires;
    public $liste_pompe;
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
    
    protected $listeners = ['index_depart_essence' => 'calculerQuantiteEtPrix', 'index_arrive_essence' => 'calculerQuantiteEtPrix'];

    public function calculerQuantiteEtPrix()
    {
        $this->qte_essence = $this->index_depart_essence - $this->index_arrive_essence;
        $this->prix_essence = $this->qte_essence * 850;
        // dd($this->qte_essence, $this->prix_essence);
    }

    //recuper la lise ds pompes ici
    public function listePompe() {
        $this->liste_pompe =  Pompe::all();
    }

    public function saveVente()
    {
        
    }
    public function render()
    {   
        
        $this->listePompe(); //passe la methode avant de retourner la vue
        return view('livewire.ventes-create')->extends('layouts.app')->title('Creer une ventes');
    }

}
