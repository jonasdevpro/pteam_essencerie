<!-- resources/views/livewire/ventes-details.blade.php -->
<div>
    @section('css')
        <style>
            .card-title {
                color: #2e2727
            }
        </style>
    @endsection
    <h2 class="text-primary text-center">Détails de la vente</h2>
    <div class="container">
        <div class="card border rounded shadow">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Informations du Pompiste</h5>
                                <p class="card-text"><strong>Pompiste :</strong>
                                    {{ optional($vente->pompiste)->nom . ' ' . optional($vente->pompiste)->prenom }}</p>
                                <p class="card-text"><strong>Heure de service :</strong> {{ $vente->heure_service }}</p>
                                <!-- Ajoutez d'autres détails ici -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Index de Carburant</h5>
                                <p class="card-text"><strong>Index de départ Super 91 :</strong>
                                    {{ $vente->index_depart_essence }}</p>
                                <p class="card-text"><strong>Index d'arrivée Super 91 :</strong>
                                    {{ $vente->index_arrive_essence }}</p>
                                <!-- Ajoutez d'autres détails ici -->
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title ">Quantité et Prix d'Essence</h5>
                                <p class="card-text"><strong>Quantité essence :</strong> {{ $vente->qte_essence }}</p>
                                <p class="card-text"><strong>Prix essence :</strong> {{ $vente->prix_essence }}</p>
                                <!-- Ajoutez d'autres détails ici -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title ">Quantité et Prix de Gazoile</h5>
                                <p class="card-text"><strong>Quantité gazoile :</strong> {{ $vente->qte_gazoile }}</p>
                                <p class="card-text"><strong>Prix gazoile :</strong> {{ $vente->prix_gazoile }}</p>
                                <!-- Ajoutez d'autres détails ici -->
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title ">Détails montants</h5>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong class="text-success">ESPECE :</strong>
                                        {{ $vente->montant_espece }}
                                        FCFA
                                    </li>
                                    <li class="list-group-item"><strong class="text-success">TPE :</strong>
                                        {{ $vente->montant_tpe }} FCFA
                                    </li>
                                    <li class="list-group-item"><strong class="text-success">BON :</strong>
                                        {{ $vente->montant_bon }} FCFA
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card bg-light mb-3">
                            <div class="card-body">
                                <h5 class="card-title ">Produits vendus</h5>
                                @if ($produitsVendus->count() > 0)
                                    <ul class="list-group list-group-flush">
                                        @foreach ($produitsVendus as $produitVendu)
                                            <li class="list-group-item">
                                                <strong>Produit:</strong> {{ $produitVendu->produit->nom }},
                                                <strong>Quantité:</strong>
                                                {{ $produitVendu->qte_produis_vendues }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p class="card-text">Aucun produit vendu.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-success mx-2">Imprimer</button>
                    <button class="btn btn-warning mx-2">Modifier</button>
                </div>
                <div class="mt-2">
                    <p class="small text-left">Date du D'enregistrement : {{ $vente->created_at }} </p>
                    <p class="small text-right">Nom de la station : [Nom de la Station]</p>
                    <p class="small text-right">
                        Par:{{ optional($vente->chef_piste)->nom . ' ' . optional($vente->chef_piste)->prenom }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
