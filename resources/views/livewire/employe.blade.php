<div class="container mt-4">
    <div class="row mb-4">
        <div class="col-md-6">
            <label for="search" class="form-label">Recherche</label>
            <div class="input-group">
                <input type="text" class="form-control" wire:model.live="recherche" placeholder="Rechercher un utilisateur">
                <div class="mx-2">
                    <button class="btn btn-warning" wire:click="ajouter">
                        Ajouter
                    </button>
                </div>
            </div>
        </div>
       
        <div class="col-md-6 d-flex align-items-end justify-content-end">
            <form >
                <button wire:click="logout" class="btn btn-danger">Déconnexion</button>
            </form>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
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
                @if($create)
                <tr>
                    <td></td>
                    <td><input wire:model="nom" type="text" name="nom" placeholder="{{ $user->nom }}"></td>
                    <td><input wire:model="prenom" type="text" name="prenom" value="{{ $user->prenom }}"></td>
                    <td><input wire:model="tel" type="number" name="tel" value="{{ $user->tel }}"></td>
                    <td>
                    <select name="active" id="" wire:model="active">
                        <option value="1">Oui</option>
                        <option value="0">Non</option>

                    </select>
                    </td>
                   <td> <select name="role" id="" wire:model="role">
                        <option value="pompiste">Gérant</option>
                        <option value="chef_piste"> Chef_piste</option>
                        <option value="Pompiste">Pompiste</option>
                         </select>
                   
                    <td>
                        <div class="button">
                            <button class="btn btn-primary" wire:click="saveNew">Créer</button>
                        </div>
                    </td>
                   
                </tr>
            @endif
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nom }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td>{{ $user->tel }}</td>
                        <td>{{$user->role? 'oui':'non'}}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <button class="btn btn-primary" wire:click="startEdite('{{ $user->id }}')"><i class="nav-icon fa-solid fa-pen"></i></button>
                        </td>
                        <td>
                            <button class="btn btn-danger" wire:click="deleteUser('{{ $user->id}}')"><i class="nav-icon fa-solid fa-trash"></i></button>
                        </td>
                    </tr>


                    @if($editId == $user->id)
    <tr>
        <form wire:submit.prevent="save('{{ $user->id }}')" id="a" class="form-control">
            <td></td>
            <td><input wire:model="nom" type="text" name="nom" ></td>
            <td><input wire:model="prenom" type="text" name="prenom"></td>
            <td><input wire:model="tel" type="number" name="tel"></td>
            <td>
                <select name="active" id="" wire:model="active">
                    <option value="1" @if($active == 1) selected @endif>Oui</option>
                    <option value="0" @if($active == 0) selected @endif>Non</option>
                </select>
            </td>
            
            <td>
                <select name="role" id="" wire:model="role" >
                    @foreach(['gerant', 'chef_piste', 'pompiste'] as $roleOption)
                        <option value="{{ $roleOption }}" @if($role == $roleOption) selected @endif>{{ ucfirst($roleOption) }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <button class="btn btn-primary" type="submit" form="a">Modifier</button>
            </td>
        </form>
    </tr>
@endif

                @endforeach
            </tbody>
        </table>
    </div>

    
</div>
