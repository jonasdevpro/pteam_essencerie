<?php

namespace App\Livewire;

use App\Models\Station;
use Livewire\Component;

class Statione extends Component
{   
    public $stations;
    public $nom_station;
    public $image_logo;
    public $image_fond;


    public function mount(){
        
        // $this->stations = Station::with('gerant')->first();
    }

    private function rules()
    {
        return  [
            'nom_station',
            'image_logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_fond' => 'image|mimes:jpeg,png,jpg,gif|max:2048', 
        ];
    }

    public function SaveStation(){
        // $this->validate($this->rules());
        dd($this->validate($this->rules()));

        $imageLogoPath = $this->image_logo->store('images', 'local');
        $imageFondPath = $this->image_fond->store('images', 'local');

        Station::create([
            'nom_station' => $this->nom_station,
            'tel_station' => $this->gerant->tel,
            'image_logo' => $imageLogoPath,
            'image_fond' => $imageFondPath,
            'gerant_id' => $this->gerant->id,
        ]);
        
        
    }

    public function render()
    {
        return view('livewire.station')->extends('layouts.app')->title('profile');
    }
}