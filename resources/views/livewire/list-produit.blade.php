<div>
    <x-custom.message-alert />
    <div class="card">
        <div class="card-header bg-danger">
            <h1 class="w-100 text-center text-light">Listes des produits</h1>
        </div>
        <div class="card-header d-flex justify-content-end">
            <a href="/create" class="btn btn-success">
                <i class="nav-icon fa-solid fa-plus"></i>
                Ajouter un nouveau produit
            </a>
        </div>
        <div class="card-header">
            <form class="search filter-form">
                @csrf
                <div class="card-header">
                    <input wire:model.live="search" type="text" placeholder="Recherche un produit ?"
                        class="form-control">

                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-striped responsive">
                <thead>
                    <th>Nom produit</th>
                    <th>Prix </th>
                    <th>Stock disponible</th>
                    <th>Seuil alerte</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @forelse ($produits as $produit)
                        <tr>
                            <td>{{ $produit->nom }}</td>
                            <td>{{ $produit->prix }} FCFA</td>
                            <td>
                                @if ($produit->stock_alert >= $produit->stock)
                                    {{ $produit->stock }}
                                    <i class="fa-solid fa-arrow-trend-down" style="color: red; font-size:24px"></i>
                                @else
                                    {{ $produit->stock }}
                                    <i class="fa-solid fa-arrow-trend-up" style="color: green;font-size:20px"></i>
                                @endif
                            </td>
                            <td> {{ $produit->stock_alert }} </td>
                            <td>
                                <ul class="nav nav-fill">
                                    <li class="nav-item">
                                        <a href="{{ route('produit.edit', $produit) }}">
                                            <i class="fa-regular fa-pen-to-square"
                                                style="color: rgb(31, 163, 146);font-size:24px"></i>
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
    </div>
    @if ($confirmingProduitDeletion)
        <x-custom.modal-alert />
    @endif
</div>
