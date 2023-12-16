<?php

namespace App\Livewire;

use DateTime;
use App\Models\User;
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
    public $configurations;

    public function mount()
    {
        // Récupérer les horaires depuis la table Configuration
        $configurations = Configuration::first(); // Supposons qu'il y ait une seule entrée dans la table

        if ($configurations) {
            $heureDebutMatin = new DateTime($configurations->heure_debut_service_matin);
            $heureReleve = new DateTime($configurations->heure_releve);
            $heureFinSoir = new DateTime($configurations->heure_fin_service_soir);
        
            $this->horaires = [
                'matin' => $heureDebutMatin->format('H:i') . ' - ' . $heureReleve->format('H:i'),
                'soir' => $heureReleve->format('H:i') . ' - ' . $heureFinSoir->format('H:i'),
            ];
        } else {
            // Valeurs par défaut si $configurations est null
            $this->horaires = [
                'matin' => '00:00 - 00:00',
                'soir' => '00:00 - 00:00',
            ];
        }
        
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
        // $this->listEmployer(); //passe la methode avant de retourner la vue
        return view('livewire.ventes-create')->extends('layouts.app')->title('Creer une ventes');
    }

}
