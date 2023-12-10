<div>
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
        <form action="" method="get" id="search" class="search filter-form">
            @csrf
            <div class="card-header">
                <input type="search" name="search" id="search"
                    placeholder="Recherche 'nom' 'reference' 'prix' " class="form-control"
                    value="{{ old('search', request()->search) }}">
            </div>


        </form>
        <div class="card-body">
            <table class="table table-striped responsive">
                <thead>
                    <th>Nom</th>
                    <th>Reference</th>
                    <th>Prix</th>
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
                                        <button type="button"  class="btn-primary"><i class="nav-icon fa-solid fa-pen"></i></button>
                                        {{-- Modifier --}}
                                    </li>
                                    <li>
                                        <button wire:click="delete({{ $produit->id }})">
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
                {{ $produit->links() }}
            </table>
        </div>
        <!-- /.modal-content -->
        <!-- /.modal-dialog -->
        </div>

    </div>

</div>
