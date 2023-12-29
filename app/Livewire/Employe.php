<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Stmt\Return_;

class Employe extends Component
{

    use WithPagination;
    //declare variables
    public string $recherche = '';
    public $editId = null;
    public $nom = "";
    public $user;
    public $prenom = "";
    public $active = "1";
    public $tel = "";
    public $role = "pompiste";
    public $create = false;
    public $showModal = false;
    public $userIdToDelete;
    public $show_user;

    //declare methods ou fonction
    
    public function ajouter()
    {
        $this->create = true;
    }
    
    public function saveNew()
    {
        $this->validate([
            'nom' => 'required|string|min:2',
            'prenom' => 'required|string|min:2',
            'tel' => 'required|numeric|min:8',
            'active' => 'required|boolean',
        ]);
    User::create([
        'nom'=>$this->nom,
        'prenom'=>$this->prenom,
        'tel'=>$this->tel,
        'active'=>$this->active,
        'role'=>$this->role,
        ]) ;
        session()->flash('success', 'Utilisateur créé avec succès!');
        return redirect()->to('/employers');
    }

    protected $queryString = [
        'recherche' => ['except' => '']
    ];

    public function startEdite(User $user)
    {
        $this->editId = $user->id;
        $this->nom = $user->nom;
        $this->prenom = $user->prenom;
        $this->tel = $user->tel;
        $this->active = $user->active;
        $this->role = $user->role;
        

        $this->resetPage();
    }
    
    public function save(User $user)
    {
        
        $user->update($this->only('nom','prenom','tel','active','role'));

        return redirect()->to('employers');

        $user->update($this->only('nom','prenom','tel'));

    }

    public function annuler(){

        return redirect()->to('employers');

    }

    public function mount(User $user)
    {
        $this->user = $user;

    }

    public function confirmDeleteUser($userId)
    {
        $this->userIdToDelete = $userId;
        $this->showModal = true;
    }
    
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->delete();
        }
        return redirect()->to('employers');
        
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->to('login');
    }
    
    public function render()
    {
        return view('livewire.employe',[
            'users' => User::where('nom', 'LIKE', "%{$this->recherche}%")
                ->orwhere('prenom', 'LIKE', "%$this->recherche%")
                ->orwhere('Tel', 'LIKE', "%$this->recherche%")
                ->orwhere('role', 'LIKE', "%$this->recherche%")
                ->orderby('nom')
                ->get()
          ])->extends('layouts.app')->title('employers');
    }
}