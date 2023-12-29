<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    <div class="modal show" tabindex="-1" style="display: block; backdrop-filter: blur(5px); ">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <button wire:click='cancelDeletion' type="button" class="close" data-dismiss="modal"
                        aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-family: Arial, Helvetica, sans-serif; font-size:18px">Êtes-vous sûr d'effectuer
                        cette action ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button wire:click='cancelDeletion' type="button" class="btn btn-light"
                        data-dismiss="modal">Fermer</button>
                    <button type="button" class="btn btn-success" wire:click="deleteProduit">Oui je suis
                        sur👍</button>
                </div>
            </div>
        </div>
    </div>
</div>
