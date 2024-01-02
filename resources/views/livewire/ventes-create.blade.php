<div class="container-fluid">
    <h3 class="text-center bg-danger p-2">Feuille de routes de Pompistes</h3>
    <x-custom.message-alert />
    <form wire:submit.prevent="saveVentes">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputDate">POMPE</label>
                        <select wire:model="pompeId" class="form-control" required>
                            <option value="" class="bg-danger">Sélectionnez une Pompe</option>
                            @forelse ($liste_pompe as $pompe)
                                <option value="{{ $pompe->id }}">{{ $pompe->nom }}</option>
                            @empty
                                <option disabled>Aucune pompe disponible</option>
                            @endforelse
                        </select>
                        @error('pompeId')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderrorrror invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="inputDate">Nom du Pompiste</label>
                        <select wire:model="pompisteId" class="form-control" required>
                            <option value="">Sélectionnez un pompiste</option>
                            @if ($users)
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nom . ' ' . $user->prenom }}
                                    </option>
                                @endforeach
                            @else
                                <option>Aucun pompiste</option>
                            @endif
                        </select>
                        @error('pompisteId')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderrorrror invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group col-6">
                        <label for="Heure">Heure de Service</label>
                        <select wire:model="heureService" class="form-control" required>
                            <option value="">Sélectionnez l'heure de service</option>
                            <option>{{ $horaires['matin'] }}</option>
                            <option>{{ $horaires['soir'] }}</option>
                        </select>
                        @error('heureService')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderrorrror invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">

                        <label for="index_depart_essence">INDEX DEPART SUPER 91</label>
                        <input type="number" class="form-control" wire:model.live="index_depart_essence">
                    </div>
                    @error('index_depart_essence')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderrorrror invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-6">
                        <label for="index_arrive_essence">INDEX ARRIVEE SUPER 91</label>
                        <input type="number" class="form-control" wire:model.live="index_arrive_essence">
                    </div>
                    @error('index_arrive_essence')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderrorrror invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="index_depart_gazoile">INDEX DEPART GAZOIL</label>
                        <input type="number" class="form-control" wire:model.live="index_depart_gazoile">
                    </div>
                    @error('index_depart_gazoile')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderrorrror invalid-feedback">{{ $message }}</span>
                    @enderror
                    <div class="form-group col-6">
                        <label for="index_arrive_gazoile">INDEX ARRIVEE GAZOIL</label>
                        <input type="number" class="form-control" wire:model.live="index_arrive_gazoile">
                    </div>
                    @error('index_arrive_gazoile')
                        <span class="error invalid-feedback">{{ $message }}</span>
                        @enderrorrror invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="selectProduit">Choisissez un produit</label>
                        <select class="form-control" wire:model="selectedProduit">
                            <option value="aucun-produit">Sélectionnez un produit</option>
                            {{-- @dump($listeProduits) --}}
                            @foreach ($listeProduits as $produit)
                                <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="quantiteVendue">Quantité vendue</label>
                        <input type="number" class="form-control" wire:model="quantiteVendue">
                    </div>
                </div>


            </div>
            {{-- // ---------Section a droie ------------------------------------------------------- --}}
            <div class="col-4">
                <div class="form-row rows-2">
                    <div class="form-group col">
                        @php
                            $qte_essence = 0;
                            $prix_essence = 0;
                            if ($index_depart_essence != null && $index_arrive_essence != null) {
                                $qte_essence = $index_arrive_essence - $index_depart_essence;
                                $prix_essence = $qte_essence * $unite_e;
                            }
                        @endphp
                        <label for="">Qté Super 91</label>

                        <input wire:model="qte_essence" class="form-control" value="{{ $qte_essence }}" readonly>
                    </div>
                    <div class="form-group col">
                        <label for="">Prix Super 91</label>
                        <input wire:model="prix_essence" class="form-control" value="{{ $prix_essence }}" readonly>
                    </div>
                </div>
                <div class="form-row rows-2">
                    <div class="form-group col">
                        @php
                            $qte_gazoile = 0;
                            $prix_gazoile = 0;
                            if ($index_depart_gazoile != null && $index_arrive_gazoile != null) {
                                $qte_gazoile = $index_arrive_gazoile - $index_depart_gazoile;
                                $prix_gazoile = $qte_gazoile * $unite_g;
                            }
                        @endphp
                        <label for="">Qté Gazoile</label>
                        <input wire:model="prix_gazoile" type="text"class="form-control" value="{{ $qte_gazoile }}"
                            readonly>
                    </div>
                    <div class="form-group col">
                        <label for="">Prix Gazoile</label>
                        <input wire:model="qte_gazoile" type="text" class="form-control" value="{{ $prix_gazoile }}"
                            readonly>
                    </div>
                </div>
                <div class="form-row rows-2">
                    <div class="form-group col">
                        {{-- {{ $prix_gazoile + $prix_essence }} --}}
                        <label for="montant">Total Montant</label>
                        <input wire:model="montant" type="number" value="{{ $prix_gazoile + $prix_essence }}"
                            class="form-control" readonly>
                    </div>
                </div>
                <div class="form-row rows-2">
                    <div class="form-group col">
                        <label for="montant_recu">Montant recu</label>
                        <input type="number" wire:model.live="montant_recu" class="form-control" required>
                    </div>
                    @php
                        $ecart = 0;
                        $montant = $prix_gazoile + $prix_essence;
                        if ($montant_recu) {
                            $ecart = $montant_recu - $montant;
                            // dd($ecart);
                        }
                    @endphp
                    <div class="form-group col">
                        <label for="ecart">Ecart ?</label>
                        <input wire:model="ecart" type="number" value="{{ $ecart }}"
                            class="form-control {{ $ecart >= 0 ? 'bg-success text-white' : 'bg-danger text-white' }}"
                            readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </form>

</div>
