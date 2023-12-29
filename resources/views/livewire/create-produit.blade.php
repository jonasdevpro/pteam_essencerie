<div>
    <div class="container">
        <div class="row justify-content-center">
            <!-- left column -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card bg-danger text-center p-3 ">
                        <h3 class=" mb-2 mx-auto">
                            @if ($produit->exists)
                                Modifier un produit
                            @else
                                Ajouter un produit
                            @endif
                        </h3>
                    </div>

                    <form class="card-body"
                        @if ($produit->exists) wire:submit="modifier('{{ $produit->id }}')" @else wire:submit="save" @endif>

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input name="nom" type="text" class="form-control @error('nom') is-invalid @enderror"
                                placeholder="Nom" wire:model="nom">
                            @error('nom')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="prix">Prix</label>
                                    <input name="prix" class="form-control @error('prix') is-invalid @enderror"
                                        type="number" placeholder="Prix" wire:model="prix">
                                    @error('prix')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-group">
                                    <label for="quantite">Quantité</label>
                                    <input name="quantite" type="number"
                                        class="form-control @error('quantite') is-invalid @enderror"
                                        placeholder="Quantité" wire:model="quantite">
                                    @error('quantite')
                                        <span class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="stock_alert">Seuil d'alerte</label>
                            <input name="stock_alert" type="number"
                                class="form-control @error('stock_alert') is-invalid @enderror"
                                placeholder="Seuil d'alerte" wire:model="stock_alert">
                            @error('stock_alert')
                                <span class="error invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-lg btn-danger">
                                @if ($produit->exists)
                                    Modifier
                                @else
                                    Enregistrer
                                @endif
                            </button>
                        </div>

                        @if (session()->has('message'))
                            <div class="alert alert-success mt-3">
                                {{ session('message') }}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
