<div class="container mt-4">
    <h2>Feuille de routes de Pompistes</h2>
    <form wire:submit.prevent="saveVentes">
        @csrf
        <div class="row">
            <div class="col-8">
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputDate">Numero Pompe</label>
                        <select wire:model="pompeId" name="mom_pompiste" class="form-control">
                            <option class="bg-danger">Veuillez choisir</option>
                            @if ($liste_pompe->isEmpty())
                                <option>Aucune pompe</option>
                            @else
                                @foreach ($liste_pompe as $pompe)
                                    <option value="{{ $pompe->id }}">{{ $pompe->nom }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="inputDate">Nom du Pompiste</label>
                        <select wire:model="pompisteId" name="mom_pompiste" class="form-control">
                            <option>Veuillez choisir</option>
                            @if ($users)
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nom . ' ' . $user->prenom }}</option>
                                @endforeach
                            @else
                                <option>Aucun employé</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="Heure">Heure de Service</label>
                        <select wire:model="heureService" name="a" class="form-control">
                            <option>Veuillez choisir ici</option>
                            <option>{{ $horaires['matin'] }}</option>
                            <option>{{ $horaires['soir'] }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">

                        <label for="">INDEX DEPART SUPER 91</label>
                        <input type="number" name="index_depart_essence" class="form-control"
                            wire:model.live="index_depart_essence">
                    </div>
                    <div class="form-group col-6">
                        <label for="">INDEX ARRIVEE SUPER 91</label>
                        <input type="number" name="index_arrive_essence" class="form-control"
                            wire:model.live="index_arrive_essence">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="">INDEX DEPART GAZOIL</label>
                        <input type="number" name="index_depart_gazoile" class="form-control"
                            wire:model.live="index_depart_gazoile">
                    </div>
                    <div class="form-group col-6">
                        <label for="">INDEX ARRIVEE GAZOIL | {{ $index_arrive_gazoile }}</label>
                        <input type="number" name="index_arrive_gazoile" class="form-control"
                            wire:model.live="index_arrive_gazoile">
                    </div>
                </div>
                <hr>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="">Avez-vous vendu des Lubrifiants ? </label>
                        <input type="number" name="lubrifiant_vendu" class="form-control"
                            wire:model="lubrifiant_vendu">
                    </div>
                    <div class="form-group col-6">
                        <label for="">Avez-vous vendu des Gaz ?</label>
                        <input type="number" name="gaz_vendu" class="form-control" wire:model="gaz_vendu">
                    </div>
                </div>
            </div>
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
                        <input wire:model="prix_gazoile" type="text" name="prix_gazoile" class="form-control"
                            value="{{ $qte_gazoile }}" readonly>
                    </div>
                    <div class="form-group col">
                        <label for="">Prix Gazoile</label>
                        <input wire:model="qte_gazoile" type="text" name="qte_gazoile" class="form-control"
                            value="{{ $prix_gazoile }}" readonly>
                    </div>
                </div>
                <div class="form-row rows-2">
                    <div class="form-group col">
                        {{ $prix_gazoile + $prix_essence }}
                        <label for="">Total Montant</label>
                        <input wire:model="montant" type="number" name="montant"
                            value="{{ $prix_gazoile + $prix_essence }}" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-row rows-2">
                    <div class="form-group col">
                        <label for="">Montant recu</label>
                        <input type="number" name="montant_recu" wire:model.live="montant_recu"
                            class="form-control">
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
                        <label for="">Ecart ?</label>
                        <input wire:model="ecart" type="number" value="{{ $ecart }}" name="ecart"
                            class="form-control {{ $ecart >= 0 ? 'bg-success text-white' : 'bg-danger text-white' }}"
                            readonly>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

</div>
