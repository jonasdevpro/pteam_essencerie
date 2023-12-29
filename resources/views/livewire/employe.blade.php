<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-12 text-center">
            <h2>Station d'essence XYZ</h2>
            <p>Bienvenue sur la plateforme de gestion de la station d'essence</p>
        </div>
        <div class="col-md-6">
            <label for="search" class="form-label">Rechercher un utilisateur </label>
            <div class="input-group">
                <input type="text" class="form-control" wire:model.live="recherche"
                    placeholder="Rechercher un utilisateur">
                <div class="mx-2">
                    <button class="btn btn-warning" wire:click="ajouter">Ajouter</button>
                </div>
            </div>
        </div>

        <div class="col-md-6 d-flex justify-content-end align-items-center">
            <!-- Ajout de l'icône de pompe à essence -->
            <img src="{{ asset('dist/img/logo.jpg') }}" width="10%" alt="Station"
                class="brand-image img-circle elevation-4" style="opacity: .8">

            <!-- Ajout du statut du système -->
            <span class="badge badge-success">Système en ligne</span>

            <!-- Ajoutez ici d'autres éléments liés à une station d'essence -->
        </div>
    </div>



    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Téléphone</th>
                    <th>Actif</th>
                    <th>Rôle</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
            <tbody>
                @if ($create)
                    <tr>
                        <td><input wire:model="nom" class="form-control" type="text"
                                placeholder="{{ $user->nom }}"></td>
                        <td><input wire:model="prenom" class="form-control" type="text" value="{{ $user->prenom }}">
                        </td>
                        <td><input wire:model="tel" class="form-control" type="number" value="{{ $user->tel }}">
                        </td>
                        <td>
                            <select name="active" wire:model="active" class="form-control">
                                <option value="1">Oui</option>
                                <option value="0">Non</option>
                            </select>
                        </td>
                        <td>
                            <select name="role" wire:model="role" class="form-control">
                                <option value="pompiste">Gérant</option>
                                <option value="chef_piste">Chef_piste</option>
                                <option value="Pompiste">Pompiste</option>
                            </select>
                        </td>
                        <td>
                            <div class="button">
                                <button class="btn btn-primary" wire:click="saveNew">Créer</button>
                            </div>
                        </td>
                        <td>
                            <div class="button">
                                <button class="btn btn-light" wire:click="annuler">Annuler</button>
                            </div>
                        </td>
                    </tr>
                @endif

                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->tel }}</td>
                        <td>{{ $user->role ? 'oui' : 'non' }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="startEdite('{{ $user->id }}')">
                                <i class="nav-icon fa-solid fa-pen"></i>
                            </button>
                        </td>
                        <td>
                            @if ($showModal)
                                @include('components.custom.modal-alert-user')
                            @endif
                            <button class="btn btn-danger" wire:click="confirmDeleteUser('{{ $user->id }}')">
                                <i class="nav-icon fa-solid fa-trash"></i>
                            </button>
                        </td>
                    </tr>

                    @if ($editId == $user->id)
                        <tr>
                            <form wire:submit.prevent="save('{{ $user->id }}')" id="a"
                                class="form-control">
                                <td><input wire:model="nom" type="text" name="nom" class="form-control"></td>
                                <td><input wire:model="prenom" type="text" name="prenom" class="form-control"></td>
                                <td><input wire:model="tel" type="number" name="tel" class="form-control"></td>
                                <td>
                                    <select name="active" wire:model="active" class="form-control">
                                        <option value="1" @if ($active == 1) selected @endif>Oui
                                        </option>
                                        <option value="0" @if ($active == 0) selected @endif>Non
                                        </option>
                                    </select>
                                </td>
                                <td>
                                    <select name="role" wire:model="role" class="form-control">
                                        @foreach (['gerant', 'chef_piste', 'pompiste'] as $roleOption)
                                            <option value="{{ $roleOption }}"
                                                @if ($role == $roleOption) selected @endif>
                                                {{ ucfirst($roleOption) }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-primary" type="submit" form="a">Modifier</button>
                                </td>
                                <td>
                                    <div class="button">
                                        <button class="btn btn-light" wire:click="annuler">Annuler</button>
                                    </div>
                                </td>
                            </form>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
