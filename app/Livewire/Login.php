<?php
namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $tel;
    public $password;

    public function login()
    {
        $credentials = [
            'tel' => $this->tel,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // L'utilisateur est authentifié, redirigez vers la page appropriée
            return redirect()->to('/employers');
        } else {
            // Échec de l'authentification, vous pouvez ajouter un message d'erreur ici si nécessaire
            session()->flash('message', 'Identifiants invalides. Veuillez réessayer.');
        }
    }

    public function render()
    {
        return view('livewire.login')->title('employers');
    }
}