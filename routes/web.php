<?php

use App\Livewire\Employe;
use App\Livewire\Connexion;
use App\Livewire\Dashboard;
use App\Livewire\VentesListe;
use App\Livewire\VentesCreate;
use App\Livewire\Configuration;
use App\Livewire\Cuve;
use App\Livewire\Pompe;
use Illuminate\Support\Facades\Route;

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



Route::get('/', Dashboard::class)->name('dashboard');
Route::get('/employers', Employe::class)->name('employeur');

Route::prefix('/config')->name('config.')->group(function () {
    Route::get('/général', Configuration::class)->name('index');
    Route::get('/pompes', Pompe::class)->name('pompes');
    Route::get('/cuves', Cuve::class)->name('cuves');
});

Route::get('/vente_create', VentesCreate::class)->name('vente.create');
Route::get('/vente_index', VentesListe::class)->name('vente.index');
Route::get('/auth', Connexion::class)->name('login');

Route::fallback(function () {
    // ...
});
