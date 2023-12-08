<div>
    <x-custom.alert />

    <div class="container">
        <h1 class="text-center">Pompes</h1>
        <div class="card ">
            <div class="card-header ">
                <button wire:click="openModal('create-pump')" class="btn btn-primary float-right">
                    <i class="fa-solid fa-plus"></i>
                    Créer
                </button>
            </div>
            <div class="card-body ">
                <h3 class="text-center mb-3">Listes des pompes</h3>
                <table class="table">
                    <thead class="text-center">
                        <th>nom</th>
                        <th>gazoil</th>
                        <th>cuve gazoil</th>
                        <th>essence</th>
                        <th>cuve essence</th>
                        <th>Action</th>
                    </thead>
                    <tbody class="text-center">
                        @forelse ($pumps as $_pump)
                        <tr wire:key=''>
                                <td>{{ $_pump->nom }}</td>
                                <td>
                                    @if($_pump->diesel ) <i class="fa-solid fa-circle-check" style="color: #00ff00;"></i> @else  <i class="fa-solid fa-circle-xmark" style="color: #ff0000;"></i> @endif
                                </td>
                                <td>{{ $_pump->dieselTank->nom }}</td>
                                <td>
                                    @if($_pump->essence ) <i class="fa-solid fa-circle-check" style="color: #00ff00;"></i> @else  <i class="fa-solid fa-circle-xmark" style="color: #ff0000;"></i> @endif
                                </td>
                                <td>{{ $_pump->fuelTank->nom }}</td>
                                <td>
                                    <ul class="nav nav-fill" style="max-width: 200px;">
                                        <li class="nav-item">
                                            <i wire:click="edit('{{ $_pump->id }}')" class="nav-icon fa-solid fa-pen" title="Modifier"></i>
                                        </li>
                                        {{-- <li class="nav-item">
                                            <i wire:click="openModal('show-pump')" class="fa-solid fa-eye text-primary" title="Voir"></i>
                                        </li> --}}
                                        <li class="nav-item">
                                            <i wire:click="openModalWithParameter('confirmDelete-pump', '{{ $_pump->id  }}')" class="fa-solid fa-trash action-btn" style="color: red" title="Supprimer"></i>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
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
        @case('create-pump')
        @case('update-pump')
            @include('includes.pompe.createAndUpdate-pumps-modal')
        @break
        {{-- @case('show-pump')
            @include('includes.pompe.show-pump-modal')
        @break --}}
        @case('confirmDelete-pump')
            @include('includes.pompe.confirmPump-delete-modal')
        @break
    @endswitch
</div>
