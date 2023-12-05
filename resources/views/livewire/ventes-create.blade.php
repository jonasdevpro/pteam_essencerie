<div class="container mt-4">
    <h2>Feuille de routes de Pompistes</h2>
    <form action="" method="POST">
        @csrf
        <div class="row">
            <div class="col-8" >
                <div class="form-row">
                    <div class="form-group col-12">
                        <label for="inputDate">Journée du</label>
                        <input type="date" class="form-control" id="inputDate" name="date" value="{{ $date_jour }}">
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
                        <select name="service" class="form-control">
                            <option>Heure de Service</option>
                            <option value="">8H - 14H</option>
                            <option value="">14H - 22H</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="">INDEX DEPART SUPER 91</label>
                        <input type="number" name="" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="">INDEX ARRIVEE SUPER 91</label>
                        <input type="number" name="" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <label for="">INDEX DEPART GAZOIL </label>
                        <input type="number" name="" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="">INDEX ARRIVEE GAZOIL</label>
                        <input type="number" name="" class="form-control">
                    </div>
                </div>
            </div>
            {{-- <div class="col-1"></div> --}}
            <div class="col-4">
                <div class="form-row rows-2">
                    <div class="form-group col">
                        <label for="">Qté Super 91</label>
                        <input type="text" name="" class="form-control"  readonly >
                    </div>
                    <div class="form-group col">
                        <label for="">Prix Super 91</label>
                        <input type="text" name="" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-row rows-2">
                    <div class="form-group col">
                        <label for="">Qté Gazoile</label>
                        <input type="text" name="" class="form-control"  readonly >
                    </div>
                    <div class="form-group col">
                        <label for="">Prix Gazoile</label>
                        <input type="text" name="" class="form-control" readonly>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>

</div>
