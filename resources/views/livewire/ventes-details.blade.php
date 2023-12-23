<!-- resources/views/livewire/ventes-details.blade.php -->
<div>
    @if ($vente)
        <h2>Journal de détail de la vente de {{ $vente->chef_piste }}</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Heure Service</th>
                    <th>Nom</th>
                    <th>Pompe & Cuve</th>
                    <th>Index Début</th>
                    <th>Index Fin</th>
                    <th>Chef Piste</th>
                </tr>
            </thead>
            <tbody>
                <!-- Utilisez les données dynamiques provenant de la base de données -->
                <tr>
                    <td> De {{ $vente->heure_service }}</td>
                    <td>{{ $vente->chef_piste_id }}</td>
                    <td>{{ $vente->pompe_id }} de la cuve {{ $vente->cuve_id }}</td>
                    <td>{{ $vente->index_depart }}</td>
                    <td>{{ $vente->index_arrive }}</td>
                    <td>{{ $vente->chef_piste }}</td>
                </tr>
                <!-- Vous pouvez ajouter d'autres lignes en fonction de vos données -->
            </tbody>
        </table>
    @else
        <p>Aucune vente trouvée pour cet identifiant.</p>
    @endif
</div>
