<div>
    <x-custom.alert />
    
    <div class="container">
        <h1 class="text-center">Configuration</h1>
        <div class="card ">
            <div class="card-body ">
                <form wire:submit='storeConf'>
                    <fieldset class="border mb-3 px-5 ">
                        <legend>Prix au litre</legend>
                        <x-forms.input wire:model='prix_litre_essence' :group="[
                            'class' => 'mb-3',
                        ]" name="prix_litre_essence"
                            type="text" :label="[
                                'text' => 'Essence',
                            ]" :grid="['col-sm-3', 'col-sm-9']" />

                        <x-forms.input wire:model='prix_litre_diesiel' :group="[
                            'class' => 'mb-3',
                        ]" name="prix_litre_diesiel"
                            type="text" :label="[
                                'text' => 'Gazoil',
                            ]" :grid="['col-sm-3', 'col-sm-9']" />
                    </fieldset>
                    <fieldset class="border px-5 mb-3">
                        <legend>Horaires</legend>

                        <x-forms.input wire:model='heure_debut_service_matin' :group="[
                            'class' => 'mb-3',
                        ]"
                            name="heure_debut_service_matin" type="time" :label="[
                                'text' => 'Début service (matin)',
                            ]" :grid="['col-sm-3', 'col-sm-9']" />

                        <x-forms.input wire:model='heure_fin_service_matin' :group="[
                            'class' => 'mb-3',
                        ]"
                            name="heure_fin_service_matin" type="time" :label="[
                                'text' => 'Fin service (matin)',
                            ]" :grid="['col-sm-3', 'col-sm-9']" />

                        <x-forms.input wire:model='heure_debut_service_soir' :group="[
                            'class' => 'mb-3',
                        ]"
                            name="heure_debut_service_soir" type="time" :label="[
                                'text' => 'Début service (soir)',
                            ]" :grid="['col-sm-3', 'col-sm-9']" />

                        <x-forms.input wire:model='heure_fin_service_soir' :group="[
                            'class' => 'mb-3',
                        ]"
                            name="heure_fin_service_soir" type="time" :label="[
                                'text' => 'Fin service (soir)',
                            ]" :grid="['col-sm-3', 'col-sm-9']" />
                    </fieldset>
                    <div class="border float-right">
                        <button type="submit" class="btn btn-primary ">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
