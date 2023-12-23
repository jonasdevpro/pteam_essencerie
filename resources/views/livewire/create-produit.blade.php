<div>
    {{-- <form wire:submit="save">
                    @csrf

                    <div class="row row-cols-2">
                    <div class="col mb-2">
                        <input name="nom" type="text" placeholder="nom" wire:model="nom">
                        @error('nom') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col mb-2">
                        <input name="reference" type="text" placeholder="reference" wire:model="reference">
                        @error('reference') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col mb-2">
                        <input name="prix" type="number" placeholder="prix" wire:model="prix" >
                        @error('prix') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col mb-2">
                        <input name="quantite" type="number" placeholder="quantite" wire:model="quantite" >
                        @error('quantite') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="col mb-2">
                        <input name="stock_alert" type="number" placeholder="minimal rappel" wire:model="stock_alert" >
                        @error('stock_alert') <span class="error">{{ $message }}</span> @enderror
                    </div>


                 </div>
                 <div class="modal-footer justify-content-between">
                    {{-- <button type="subm" class="btn btn-default" data-dismiss="modal">Close</button> --}}
    {{-- <button type="submit" >Enregistrer</button>
                  </div> --}}
    {{-- </form>
            </div> --}}

    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-10">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">NOUVEAU</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form class=""
                    @if ($produit->exists) wire:submit="modifier('{{ $produit->id }}')" @else wire:submit="save" @endif>


                        <div class="card-body">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input  name="nom" type="text" class="form-control" placeholder="nom"
                                    wire:model="nom">
                                @error('nom')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input name="prix" class="form-control" type="number" placeholder="prix"
                                    wire:model="prix">
                                @error('prix')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quantite">Quantite</label>
                                <input name="quantite" type="number" class="form-control" placeholder="quantite"
                                    wire:model="quantite">
                                @error('quantite')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="stock_alert">seuil d'alert</label>
                                <input name="stock_alert" type="number" class="form-control"
                                    placeholder="minimal rappel" wire:model="stock_alert">
                                @error('stock_alert')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">@if ($produit->exists) Modifier @else Enregistrer @endif</button>
                        </div>


                        @if (session()->has('message'))
                        <div class="alert alert-success">
                        {{ session('message') }}
                        </div>
                    @endif



                    </form>
                </div>
            </div>
        </div>
    </div>



</div>
