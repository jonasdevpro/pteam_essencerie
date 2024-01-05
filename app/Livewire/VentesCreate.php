<?php

namespace App\Livewire;

use DateTime;
use App\Models\User;
use App\Models\Pompe;
use App\Models\Vente;
use App\Models\Produit;
use Livewire\Component;
use App\Models\Configuration;
use App\Models\VentesProduit;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VentesCreate extends Component
{
    public $index_arrive_essence = 0;
    public $index_depart_essence = 0;
    public $index_depart_gazoile = 0;
    public $index_arrive_gazoile = 0;
    public $heureService;
    public $pompisteId;
    public $pompeId;
    public $lubrifiant_vendu = 0;
    public $gaz_vendu = 0;
    public $horaires = [];
    public $liste_pompe;
    public $users;
    public $unite_e;
    public $unite_g;
    public $montant_recu = 0;
    public $listeProduits;
    // public $selectedProduit;
    public $nombreProduits;
    public $selectedProduits=[];
    public $quantitesVendues=[];

    public function mount()
    {
        $this->loadData();
    }

    private function loadData()
    {
        $this->listePompe();
        $this->listeEmployer();
        $this->unitePrix();
        $this->config();
        $this->listeProduits = Produit::all();
        for ($i = 1; $i <= $this->nombreProduits; $i++) {
            $this->selectedProduits[$i] = null;
            $this->quantitesVendues[$i] = null;
        }
    }

    private function rules()
    {
        return [
            'pompeId' => 'required',
            'pompisteId' => 'required',
            'heureService' => 'required',
            'index_depart_essence' => 'required|numeric',
            'index_arrive_essence' => 'required|numeric',
            'index_depart_gazoile' => 'required|numeric',
            'index_arrive_gazoile' => 'required|numeric',
            'montant_recu' => 'required|numeric',
        ];
    }

    public function saveVentes()
    {
        $this->validate($this->rules());

        $prixEssence = ($this->index_arrive_essence - $this->index_depart_essence) * $this->unite_e;
        $prixGazoile = ($this->index_arrive_gazoile - $this->index_depart_gazoile) * $this->unite_g;
        $montant = $prixGazoile + $prixEssence;
        $ecart = $this->montant_recu - $montant;

        try {
            // Création de la vente principale
            $vente = new Vente([
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

            // Enregistrement de la vente principale
            $vente->save();

            // Enregistrement des produits vendus dans la table pivot
            for ($i = 1; $i <= $this->nombreProduits; $i++) {
                if ($this->selectedProduits[$i] && $this->quantitesVendues[$i]) {
                    $produit = Produit::find($this->selectedProduits[$i]);

                    $vente_produit = new VentesProduit([
                        'produit_id' => $this->selectedProduits[$i],
                        'vente_id' => $vente->id,
                        'qte_produis_vendues' => $this->quantitesVendues[$i],
                        'prix_unitaire' => $produit->prix,
                    ]);

                    $vente_produit->save();
                }
            }

            // Réinitialisation des champs du formulaire
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

            session()->flash('success', 'Opération créée avec succès!');
            $this->redirect('/vente_index');
        } catch (\PDOException $e) {
            Log::error('Erreur PDO: ' . $e->getMessage());
            $this->redirect('/vente_index');
        }
    }

    private function config()
    {
        $configurations = Configuration::first();

        if ($configurations) {
            $heureDebutMatin = new DateTime($configurations->heure_debut_service_matin);
            $heureReleve = new DateTime($configurations->heure_releve);
            $heureFinSoir = new DateTime($configurations->heure_fin_service_soir);

            $this->horaires = [
                'matin' => $heureDebutMatin->format('H:i') . ' - ' . $heureReleve->format('H:i'),
                'soir' => $heureReleve->format('H:i') . ' - ' . $heureFinSoir->format('H:i'),
            ];
        } else {
            $this->horaires = [
                'matin' => '00:00 - 00:00',
                'soir' => '00:00 - 00:00',
            ];
        }
    }

    private function unitePrix()
    {
        try {
            $configuration = Configuration::first();

            if ($configuration === null || $configuration->prix_litre_essence === null || $configuration->prix_litre_diesel === null) {
                $this->redirect('/config/général');
            }

            $this->unite_e = $configuration->prix_litre_essence;
            $this->unite_g = $configuration->prix_litre_diesel;
        } catch (\Exception $e) {
            Log::error('Une erreur s\'est produite: ' . $e->getMessage());
            $this->redirect('/config/général');
        }
    }

    public function listePompe()
    {
        try {
            $this->liste_pompe = Pompe::get();

            if ($this->liste_pompe->isEmpty()) {
                $this->redirect('/config/pompes');
            }
        } catch (\Exception $e) {
            Log::error('Une erreur s\'est produite: ' . $e->getMessage());
            $this->redirect('/config/pompes');
        }
    }

    public function listeEmployer()
    {
        $this->users = User::where('role', 'pompiste')->get();
    }

    public function render()
    {
        return view('livewire.ventes-create')->extends('layouts.app')->title('Créer une vente');
    }
}