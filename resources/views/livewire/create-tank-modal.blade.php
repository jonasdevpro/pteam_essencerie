<div class="modal show" tabindex="-1" style="display: block;" id="create-tank-modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ !empty($tank) ? "Modifier {$form->nom}" : 'Creer une cuve' }}</h5>
                <button wire:click='closeModal' type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit={{ !empty($tank) ? "update" : 'store' }} id="store-tank-form">
                    <x-forms.input wire:model='form.nom' :group="[
                        'class' => 'mb-3',
                    ]" name="form.nom" type="text" required
                        :label="[
                            'text' => 'Nom',
                        ]" />
                    <x-forms.input wire:model='form.capacite' :group="[
                        'class' => 'mb-3',
                    ]" name="form.capacite" type="number" required
                        :label="[
                            'text' => 'Capacité (Litre)',
                        ]" />

                    <x-forms.select wire:model='form.contenu' name="form.contenu" required :group="[
                        'class' => 'mb-3',
                    ]"
                        :options="['' => 'Type de contenu', 'essence' => 'Essence', 'diesel' => 'Gazoil']" :label="['text' => 'Contenu']" />

                    <x-forms.textarea wire:model='form.description' name="desctiption" rows='4' :group="['class' => 'mb-3']"
                        :label="['text' => 'Description (optionel)']" />
                </form>
            </div>
            <div class="modal-footer">
                <button wire:click='closeModal' type="button" class="btn btn-secondary"
                    data-dismiss="modal">Fermé</button>
                <button form="store-tank-form" type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show"></div>
