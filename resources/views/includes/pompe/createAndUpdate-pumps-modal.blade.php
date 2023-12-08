<div class="modal show" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button wire:click='closeModal' type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit={{ !empty($pump) ? 'update' : 'store' }} id="storeAndUpdate-pump-form">
                    <x-forms.input wire:model='form.nom' :group="[
                        'class' => 'mb-3',
                    ]" name="form.nom" type="text" required
                        :label="[
                            'text' => 'Nom',
                        ]" />
                    <fieldset class="border mb-3 px-5 d-flex">
                        <legend style="font-size: 18px">Gachette</legend>
                        <x-forms.checkbox wire:model='form.essence' :group="[
                            'class' => 'mb-1 w-50',
                        ]" name="form.essence" :checked="$form->essence"
                            :label="[
                                'text' => 'Essence',
                            ]" />
                        <x-forms.checkbox wire:model='form.diesel' :group="[
                            'class' => 'mb-1 w-50',
                        ]" name="form.diesel" :checked="$form->diesel"
                            :label="[
                                'text' => 'diesel',
                            ]" />
                    </fieldset>

                    <fieldset class="border mb-3 px-2">
                        <legend style="font-size: 18px">Cuves</legend>
                        <div class="row row-cols-2">
                            <div class="col">
                                <x-forms.select wire:model='form.cuve_id_essence' name="form.cuve_id_essence" required
                                    :group="[
                                        'class' => 'mb-3',
                                    ]" :options="$fuelTanks" :label="['text' => 'Cuve à essence']" />
                            </div>
                            <div class="col">
                                <x-forms.select wire:model='form.cuve_id_diesel' name="form.cuve_id_diesel" required
                                    :group="[
                                        'class' => 'mb-3',
                                    ]" :options="$dieselTanks" :label="['text' => 'Cuve à gazoil']" />
                            </div>
                        </div>
                    </fieldset>

                    <x-forms.textarea wire:model='form.description' name="form.desctiption" rows='4'
                        :group="['class' => 'mb-3']" :label="['text' => 'Description (optionel)']" />
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click='closeModal' type="button" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="submit" form="storeAndUpdate-pump-form" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>
