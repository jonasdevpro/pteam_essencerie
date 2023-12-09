<div class="container mt-4">
    <h2>Feuille de routes de Pompistes</h2>
    <form wire:submit.prevent="saveVente">
        @csrf
        <div class="row">
            <div class="col-8" >
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputDate">Numero Pompe</label>
                        <select name="mom_pompiste" class="form-control">
                            <option>Choisir une pompe</option>
                            <option value="">Pompe A</option>
                            <option value="">Pompe B</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="inputDate">Nom du Pompiste</label>
                        <select name="mom_pompiste" class="form-control">
                            <option>Nom du Pompiste</option>
                            <option value="">Ouedraogo Moussa</option>
                            <option value="">Kafando Alan</option>
                            <option value="">Sawadaogo Asmao</option>
                            <option value="">Kabore Wendyam Billa</option>
                        </select>
                    </div>
                    <div class="form-group col-6">
                        <label for="Heure">Heure de Service</label>
                        <select name="heure_service" class="form-control">
                            <option>Veuillez choisir ici</option>
                            <option value="matin"> {{ $horaires['matin']  }} </option>
                            <option value="soir"> {{  $horaires['soir'] }} </option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="">INDEX DEPART SUPER 91</label>
                        <input type="number" name="index_depart_essence" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="">INDEX ARRIVEE SUPER 91</label>
                        <input type="number" name="index_arrive_essence" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="">INDEX DEPART GAZOIL </label>
                        <input type="number" name="index_depart_gazoile" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="">INDEX ARRIVEE GAZOIL</label>
                        <input type="number" name="index_arrive_gazoile" class="form-control">
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="form-row rows-2">
                    <div class="form-group col">
                        <label for="">Qté Super 91</label>
                        <input type="text" name="qte_essence" class="form-control" readonly>
                    </div>
                    <div class="form-group col">
                        <label for="">Prix Super 91</label>
                        <input type="text" name="prix_essence" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-row rows-2">
                    <div class="form-group col">
                        <label for="">Qté Gazoile</label>
                        <input type="text" name="prix_gazoile" class="form-control"  readonly>
                    </div>
                    <div class="form-group col">
                        <label for="">Prix Gazoile</label>
                        <input type="text" name="qte_gazoile" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

</div>
