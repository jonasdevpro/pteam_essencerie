<div>
    {{-- @dump($this) --}}
    <div class="container-fluid">
        <h4 class="text-center bg-danger p-2">Feuille de routes de Pompistes</h4>
        <x-custom.message-alert />
        <form wire:submit="saveVentes">
            @csrf
            <div class="row">
                <div class="col-8 border border-default border-3 border-solid">
                    <div class="form-group">
                        <label for="nombreProduits">Nombre de produits à vendus</label>
                        <input type="number" class="form-control" id="nombreProduits" wire:model.live="nombreProduits"
                            placeholder="combien de produits vendus">
                    </div>
                    @if ($nombreProduits > 0)
                        <div class="form-row bg-opacity-10 border border-info border-start-0 rounded-end">
                            @for ($i = 1; $i <= $nombreProduits; $i++)
                                <div class="form-group col-6">
                                    <label for="selectProduit{{ $i }}">Choisissez un produit</label>
                                    <select class="form-control" name="selectedProduits"
                                        id="selectedProduits.{{ $i }}"
                                        wire:model="selectedProduits.{{ $i }}">
                                        <option value="">Sélectionnez un produit</option>
                                        @foreach ($listeProduits as $produit)
                                            <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-6">
                                    <label for="quantiteVendue{{ $i }}">Quantité vendue</label>
                                    <input type="number" class="form-control" name="quantitesVendues"
                                        id="quantitesVendues.{{ $i }}"
                                        wire:model="quantitesVendues.{{ $i }}">
                                </div>
                            @endfor
                        </div>
                    @endif
                    <hr class="">
                    <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputDate">POMPE</label>
                            <select wire:model="pompeId" name="pompeId" id="pompeId" class="form-control" required>
                                <option value="0" class="bg-danger">Sélectionnez une Pompe</option>
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
                            <select wire:model="pompisteId" name="pompisteId" class="form-control" required>
                                <option value="0">Sélectionnez un pompiste</option>
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
                            <select wire:model="heureService" name="heureService" class="form-control" required>
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
                            <input type="number" class="form-control" name="index_depart_essence"
                                id="index_depart_essence" wire:model.live="index_depart_essence" required>
                        </div>
                        @error('index_depart_essence')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderrorrror invalid-feedback">{{ $message }}</span>
                        @enderror
                        <div class="form-group col-6">
                            <label for="index_arrive_essence">INDEX ARRIVEE SUPER 91</label>
                            <input type="number" class="form-control" name="index_arrive_essence"
                                id="index_arrive_essence" wire:model.live="index_arrive_essence">
                        </div>
                        @error('index_arrive_essence')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderrorrror invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-row">
                        <div class="form-group col-6">
                            <label for="index_depart_gazoile">INDEX DEPART GAZOIL</label>
                            <input type="number" class="form-control" name="index_depart_gazoile"
                                id="index_depart_gazoile" wire:model.live="index_depart_gazoile">
                        </div>
                        @error('index_depart_gazoile')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderrorrror invalid-feedback">{{ $message }}</span>
                        @enderror
                        <div class="form-group col-6">
                            <label for="index_arrive_gazoile">INDEX ARRIVEE GAZOIL</label>
                            <input type="number" class="form-control" name="index_arrive_gazoile"
                                id="index_arrive_gazoile" wire:model.live="index_arrive_gazoile">
                        </div>
                        @error('index_arrive_gazoile')
                            <span class="error invalid-feedback">{{ $message }}</span>
                            @enderrorrror invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <hr>
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

                            <input wire:model="qte_essence" name="qte_essence" id="qte_essence" class="form-control"
                                value="{{ $qte_essence }}" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="">Prix Super 91</label>
                            <input wire:model="prix_essence" name="prix_essence" id="prix_essence"
                                class="form-control" value="{{ $prix_essence }}" readonly>
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
                            <input wire:model="prix_gazoile" name="prix_gazoile" id="prix_gazoile"
                                type="text"class="form-control" value="{{ $qte_gazoile }}" readonly>
                        </div>
                        <div class="form-group col">
                            <label for="">Prix Gazoile</label>
                            <input wire:model="qte_gazoile" name="qte_gazoile" id="qte_gazoile" type="text"
                                class="form-control" value="{{ $prix_gazoile }}" readonly>
                        </div>
                    </div>
                    <div class="form-row rows-2">
                        <div class="form-group col">
                            {{-- {{ $prix_gazoile + $prix_essence }} --}}
                            <label for="montant_total_normal">Total</label>
                            <input wire:model="montant_total_normal" name="montant_total_normal"
                                id="montant_total_normal" type="number" value="{{ $prix_gazoile + $prix_essence }}"
                                class="form-control" readonly>
                        </div>
                    </div>
                    <strong>Details montants</strong>
                    <hr>
                    <div class="form-row rows-2">
                        <div class="form-group col">
                            <label for="montant_espece">ESPECE</label>
                            <input type="number" name="montant_espece" wire:model.live="montant_espece"
                                value="{{ $montant_espece }}" class="form-control" required>
                        </div>
                        <div class="form-group col">
                            <label for="ecart">TPE</label>
                            <input type="number" name="montant_tpe" wire:model.live="montant_tpe"
                                value="{{ $montant_tpe }}" class="form-control">
                        </div>
                    </div>
                    <div class="form-row rows-2">
                        <div class="form-group col">
                            <label for="montant_bon">BON</label>
                            <input type="number" name="montant_bon" wire:model.live="montant_bon"
                                value="{{ $montant_bon }}" class="form-control">
                        </div>
                        @php
                            $montant = $prix_gazoile + $prix_essence;
                            $e = floatval($montant_espece) + floatval($montant_bon) + floatval($montant_tpe);
                            $ecart = $montant - $e;
                        @endphp
                        <div class="form-group col">
                            <label for="ecart">Ecart ?</label>
                            <input wire:model="ecart" type="number" value="{{ $ecart }}"
                                class="form-control {{ $montant >= $e ? 'bg-success text-white' : 'bg-danger text-white' }}"
                                readonly>
                        </div>
                    </div>
                    <div class="form-row">
                        @php
                            $ecart = 0;
                            $montant_total_recu = 0;
                            if ($montant_espece != null || $montant_bon != null || $montant_tpe != null) {
                                $montant_total_recu = $e;
                            }
                        @endphp
                        <div class="form-group col">
                            <label for="montant_total_recu">Montant Total recu</label>
                            <input type="number" wire:model="montant_total_recu" name="montant_total_recu"
                                id="montant_total_recu" value="{{ $montant_total_recu }}" class="form-control"
                                required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </form>

    </div>
</div>
