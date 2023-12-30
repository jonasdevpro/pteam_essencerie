<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Journal de Ventes de la Semaine </h3>

                <div class="card-tools">

                </div>
            </div>
        </div>
        <x-custom.message-alert />
        <!-- /.card-header -->
        <!-- ventes-liste.blade.php -->

        <div class="card-body table-responsive p-0" style="height: 450px;">
            <table class="table table-striped table-bordered text-nowrap">
                <thead class="thead-dark">
                    <tr>
                        <th rowspan="2">DATE</th>
                        <th colspan="2">VENTES ESSENCES</th>
                        <th colspan="2">VENTES GAZOIL</th>
                        <th rowspan="2">VENTES TOTALES</th>
                    </tr>
                    <tr>
                        <th>Qte litre</th>
                        <th>Montant</th>
                        <th>Qte litre</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ventes as $vente)
                        <tr>
                            <td><a
                                    href="{{ route('vente.show', ['id' => $vente->id]) }}">{{ $vente->created_at->format('d-m-Y') }}</a>
                            </td>
                            {{-- <td><a wire:click="showDetailVentes({{ $vente->id }})"
                                    style="cursor: pointer;">{{ $vente->created_at->format('d-m-Y') }}
                                  </a>
                            </td> --}}
                            <td>{{ $vente->qte_essence }}</td>
                            <td>{{ $vente->prix_essence }} FCFA</td>
                            <td>{{ $vente->qte_gazoile }}</td>
                            <td>{{ $vente->prix_gazoile }} FCFA</td>
                            <td>{{ $vente->montant }} FCFA</td>
                        </tr>
                    @empty
                        <td colspan="6">
                            <h4 class="text-center text-warning">Aucune ventes Enrégistrer ⚠️</h4>
                        </td>
                    @endforelse
                </tbody>
            </table>
        </div>


        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
</div>
