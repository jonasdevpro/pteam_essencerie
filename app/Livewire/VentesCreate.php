<?php

namespace App\Livewire;

use DateTime;
use App\Models\User;
use App\Models\Pompe;
use App\Models\Vente;
use Livewire\Component;
use App\Models\Configuration;
use Illuminate\Support\Facades\Auth;

class VentesCreate extends Component
{

    public $index_arrive_essence = 120;
    public $index_depart_essence = 10;

    // public $qte_essence;
    // public $prix_essence;


    public $index_depart_gazoile = 10;
    public $index_arrive_gazoile = 120;
    // public $active;
    public $heureService;
    // public $chefPisteId;
    public $pompisteId;
    public $pompeId;
    

    public $lubrifiant_vendu = 0;
    public $gaz_vendu = 0;

    public $horaires = [];
    public $liste_pompe;
    // public $configurations;
    public $users;
    public $unite_e;
    public $unite_g;
    // public $ecart;
    // public $montant;
    public $montant_recu = 0;

    public function mount()
    {  
        $this->listePompe();
        $this->listeEmployer();
        $this->UnitePrix();
        $this->Config();
        // $this->saveVentes();  
    }
    
    public function saveVentes()
    {
        // dd($this->all());
        // $this->validate([
        //     'heure_service' => 'required',
        //     'index_depart_essence' => 'required|numeric',
        //     'index_arrive_essence' => 'required|numeric',
        //     'index_depart_gazoile' => 'required|numeric',
        //     'index_arrive_gazoile' => 'required|numeric',
        //     'qte_essence' => 'required|numeric',
        //     'prix_essence' => 'required|numeric',
        //     'prix_gazoile' => 'required|numeric',
        //     'qte_gazoile' => 'required|numeric',
        //     'montant' => 'required|integer',
        //     'montant_recu' => 'required|numeric',
        // ]);
        
        $prixEssence = ( $this->index_arrive_essence - $this->index_depart_essence) * $this->unite_e;
        $prixGazoile =( $this->index_arrive_gazoile - $this->index_depart_gazoile) * $this->unite_g;
        $montant = $prixGazoile + $prixEssence;
        $ecart = $this->montant_recu - $montant;
        
        $ventes = Vente::create([
            'chef_piste_id' => Auth::user()->id,
            'pompiste_id' => $this->pompisteId,
            'pompe_id' => $this->pompeId,
            'heure_service' => $this->heureService,
            'index_depart_essence' => $this->index_depart_essence,
            'index_arrive_essence' => $this->index_arrive_essence,
            'index_depart_gazoile' => $this->index_depart_gazoile,
            'index_arrive_gazoile' => $this->index_arrive_gazoile,
            'qte_essence' => $this->index_arrive_essence - $this->index_depart_essence,
            'prix_essence' => $prixEssence,
            'qte_gazoile' => $this->index_arrive_gazoile - $this->index_depart_gazoile,
            'prix_gazoile' => $prixGazoile,
            'montant_recu' => $this->montant_recu,
            'montant' => $montant,
            'ecart' => $ecart,
        ]);
        
        // dd($ventes);
        // Réinitialiser les propriétés si nécessaire
        $this->reset([
            'pompisteId',
            'pompeId',
            'heureService',
            'index_depart_essence',
            'index_arrive_essence',
            'index_depart_gazoile',
            'index_arrive_gazoile',
            'montant_recu',
        ]);
    
        // Si vous avez besoin de rediriger l'utilisateur ou de faire d'autres actions après la création
        // return redirect()->to('chemin_vers_redirection');
    }
    

    public function Config(){
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
    
    protected function UnitePrix(){
        $this->unite_e = Configuration::first()->prix_litre_essence;
        $this->unite_g = Configuration::first()->prix_litre_diesel;

    // dd($this->unite_e, $this->unite_g);
    }
    //recuper la lise ds pompes ici
    public function listePompe() {
        $this->liste_pompe =  Pompe::all();
    }

    
    public function listeEmployer(){
        $this->users = User::where('role', 'pompiste')->get();
        // dd($this->users);
    }
   
    public function render()
    {   
    
        // $this->listEmployer(); //passe la methode avant de retourner la vue
        return view('livewire.ventes-create',
        [
            // 'horaires' => $this->Config()
        ])->extends('layouts.app')->title('Creer une ventes');
    }

}