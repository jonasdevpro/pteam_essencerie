<?php

use App\Livewire\Cuve;
use App\Livewire\Login;
use App\Livewire\Pompe;
use App\Livewire\Employe;
use App\Livewire\Station;
use App\Livewire\Connexion;
use App\Livewire\Dashboard;

use App\Livewire\ListProduit;
use App\Livewire\VentesListe;
use App\Livewire\VentesCreate;
use App\Livewire\Configuration;
use App\Livewire\CreateProduit;
use App\Livewire\VentesDetails;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::fallback(function () {
    // ...
});

Route::middleware(['auth'])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/profile_statut', Station::class)->name('profile_statut');

    Route::get('/employers', Employe::class)->name('employeur');
    Route::prefix('/config')->name('config.')->group(function () {
        Route::get('/général', Configuration::class)->name('index');
        Route::get('/pompes', Pompe::class)->name('pompes');
        Route::get('/cuves', Cuve::class)->name('cuves');
    });
    Route::get('/vente_create', VentesCreate::class)->name('vente.create');
    Route::get('/vente_index', VentesListe::class)->name('vente.index');
    Route::delete('/employers/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/vente_show/{id}', VentesDetails::class)->name('vente.show');

    Route::get('/liste', ListProduit::class)->name('liste');
    Route::get('/create', CreateProduit::class)->name('create');
    Route::get('/edit/{produit}', CreateProduit::class)->name('produit.edit');
});
Route::get('/employers/login', Login::class)->name('login');