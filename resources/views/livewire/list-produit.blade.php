<div>


    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>

    @endif
    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
    <div class="card">
        <div class="card-header bg-secondary">
            <h1 class="w-100 text-center text-light">Gestion des produits</h1>
        </div>
        <div class="card-header d-flex justify-content-end">
            <a href="/create" class="btn btn-primary">
                <i class="nav-icon fa-solid fa-plus"></i>
                Créer
            </a>
        </div>

        {{-- <div class="card-header">
                <form action="" method="get" id="search" class="search filter-form">
                    @csrf
                    <div class="card-header">
                        <input wire:search
                            placeholder="Recherche 'nom' 'prix' " class="form-control">
                    </div>
                </form>
            </div> --}}

        <div class="card-header">
            <form class="search filter-form">
                @csrf
                <div class="card-header">
                    <input wire:model.live="search" type="text" placeholder="Recherche 'nom' 'prix'"
                        class="form-control">

                </div>
            </form>
        </div>


        <div class="card-body">
            <table class="table table-striped responsive">
                <thead>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>quantite</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @forelse ($produits as $produit)
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->prix }}</td>
                            <td>{{ $produit->quantite }}</td>
                            <td>
                                <ul class="nav nav-fill">
                                    <li class="nav-item">
                                        <a href="{{ route('produit.edit', $produit) }}">
                                            <button class="btn-primary"><i
                                                    class="nav-icon fa-solid fa-pen"></i></button>
                                        </a>
                                    </li>
                                    <li>
                                        <button wire:click="confirmProduitDeletion('{{ $produit->id }}')">
                                            <i class="nav-icon fa-solid fa-trash action-btn" style="color: red"></i>
                                        </button>
                                    </li>

                                </ul>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">Aucun produit trouvé</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- {{ $produit->links() }} --}}
        </div>
        <!-- /.modal-content -->
        <!-- /.modal-dialog -->
    </div>
    @if ($confirmingProduitDeletion)
        {{--
            <div class="modal show" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirmation de suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            wire:click="cancelDeletion"></button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer ce produit ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            wire:click="cancelDeletion">Annuler</button>
                        <button type="button" class="btn btn-danger"
                            wire:click="deleteProduit">Supprimer</button>
                    </div>
                </div>
            </div>
            </div>
        --}}
        <div class="modal show" tabindex="-1" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button wire:click='cancelDeletion' type="button" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button wire:click='cancelDeletion' type="button" class="btn btn-secondary"
                            data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" wire:click="deleteProduit">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="modal-backdrop fade show"></div> --}}
    @endif
</div>
