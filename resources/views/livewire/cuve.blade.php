<div>
    <x-custom.alert />

    <div class="container">
        <h1 class="text-center">Cuves</h1>
        <div class="card ">
            <div class="card-header ">
                <button wire:click="openModal('create-tank')" class="btn btn-primary float-right">
                    <i class="fa-solid fa-plus"></i>
                    Créer
                </button>
            </div>
            <div class="card-body ">
                <h3 class="text-center mb-3">Listes des cuves</h3>
                <table class="table">
                    <thead class="text-center">
                        <th>nom</th>
                        <th>Capacipté (Litre)</th>
                        <th>Contenu</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($tanks as $_tank)
                            <tr wire:key='{{ $_tank->id }}'>
                                <td>{{ $_tank->nom }}</td>
                                <td>{{ $_tank->capacite }}</td>
                                <td>{{ $_tank->contenu }}</td>
                                <td>
                                    <ul class="nav nav-fill" style="max-width: 200px;">
                                        <li class="nav-item">
                                            <i wire:click="edit('{{ $_tank->id }}')" class="nav-icon fa-solid fa-pen" title="Modifier"></i>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <i wire:click="openModal('show-tank')" class="fa-solid fa-eye text-primary" title="Voir"></i>
                                        </li> --}}
                                        <li class="nav-item">
                                            <i wire:click="openModalWithParameter('confirmDelete-tank', '{{ $_tank->id }}')" class="fa-solid fa-trash action-btn" style="color: red" title="Supprimer"></i>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">
                                    <p class="text-center lead w-100">Vide</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- modal --}}

    @switch($modalOpen)
        @case('create-tank')
            @include('includes.cuve.create-tank-modal')
        @break

        {{-- @case('show-tank')
            @include('includes.cuve.show-tank-modal')
        @break --}}
        @case('confirmDelete-tank')
            @include('includes.cuve.confirmTank-delete-modal')
        @break
    @endswitch
</div>
