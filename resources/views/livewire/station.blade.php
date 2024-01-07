<div>
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Information sur la Station</h1>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-danger card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset('dist/img/logo.jpg') }}" alt="station logo">
                                </div>

                                <h3 class="profile-username text-center">APRILE OIL</h3>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Pompiste</b> <a class="float-right">13</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Chef de piste</b> <a class="float-right">2</a>
                                    </li>
                                </ul>

                                <a href="#" class="btn btn-danger btn-block"><b>Se Déconnecté</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-3">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">Programme</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Ma
                                            Station</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#settings"
                                            data-toggle="tab">Changement de Mot de passe</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="activity">
                                        <div class="container mt-3">
                                            <h2 class="text-center mb-4">Horaires des Pompistes</h2>

                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Jour</th>
                                                        <th>6h - 14h</th>
                                                        <th>14h - 22h</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <!-- Lundi -->
                                                    <tr>
                                                        <td>Lundi</td>
                                                        <td>Kevin, Traore Sam, Oudreago Alice</td>
                                                        <td>Yannick, Ibraime, Dalil</td>
                                                    </tr>

                                                    <!-- Mardi -->
                                                    <tr>
                                                        <td>Mardi</td>
                                                        <td>Lucas, Elise, Benjamin</td>
                                                        <td>Isabelle, Julien, Emma</td>
                                                    </tr>

                                                    <!-- Mercredi -->
                                                    <tr>
                                                        <td>Mercredi</td>
                                                        <td>Alice, Thomas, Lea</td>
                                                        <td>Nathan, Camille, Hugo</td>
                                                    </tr>

                                                    <!-- Jeudi -->
                                                    <tr>
                                                        <td>Jeudi</td>
                                                        <td>Emma, Gabriel, Chloe</td>
                                                        <td>Liam, Manon, Louis</td>
                                                    </tr>

                                                    <!-- Vendredi -->
                                                    <tr>
                                                        <td>Vendredi</td>
                                                        <td>Charlotte, Mathis, Clara</td>
                                                        <td>Ethan, Zoe, Noah</td>
                                                    </tr>

                                                    <!-- Samedi -->
                                                    <tr>
                                                        <td>Samedi</td>
                                                        <td>Lea, Nathan, Ines</td>
                                                        <td>Gabriel, Camille, Tom</td>
                                                    </tr>

                                                    <!-- Dimanche -->
                                                    <tr>
                                                        <td>Dimanche</td>
                                                        <td>Louis, Chloe, Liam</td>
                                                        <td>Clara, Manon, Ethan</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        {{-- @if ($stations) --}}
                                        <form class="form-horizontal" wire:submit="SaveStation">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="image_logo" class="col col-form-label">Logo
                                                </label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image_logo" class="form-control"
                                                        id="image_logo">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nom_station" class="col-sm-2 col-form-label">
                                                    Staion</label>
                                                <div class="col-sm-10">
                                                    <input type="text" wire:model="nom_station" class="form-control"
                                                        id="nom_station" name="nom_station"
                                                        placeholder="Entrer le nom de la Station">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="nom_gerant" class="col-sm-2 col-form-label">Gérant</label>
                                                <div class="col-sm-10">
                                                    <input type="text" wire:model="nom_gerant" class="form-control"
                                                        id="nom_gerant"
                                                        placeholder="Entrer le nom du responsable ou Gérant">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="tel_station" class="col-sm-2 col-form-label">Numéro de
                                                    Teléphone</label>
                                                <div class="col-sm-10">
                                                    <input type="number" wire:model="tel_station" class="form-control"
                                                        id="tel_station" placeholder="Numero de telephone">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="image_fond" class="col col-form-label">Image
                                                    Fond</label>
                                                <div class="col-sm-10">
                                                    <input type="file" wire:model="image_fond" class="form-control"
                                                        id="image_fond">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Enregistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                        {{-- @endif --}}
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <form class="form-horizontal">
                                            <div class="form-group row">
                                                <label for="nom_station"
                                                    class="col-sm-2 col-form-label">Ancien</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="inputName"
                                                        placeholder="Entrer votre ancien mot de passe">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail"
                                                    class="col-sm-2 col-form-label">Nouveau</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="nom_gerant"
                                                        placeholder="Entrer le nouveau mot de passe">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2"
                                                    class="col-sm-2 col-form-label">Confirmer</label>
                                                <div class="col-sm-10">
                                                    <input type="password" class="form-control" id="tel_station"
                                                        placeholder="Confirmer le nouveau mot de passe">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Enrégistrer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div><!-- /.container-fluid -->
</div>
