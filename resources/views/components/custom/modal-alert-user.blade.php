<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
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
                    <p style="font-family: Arial, Helvetica, sans-serif; font-size:18px">
                        Êtes-vous sûr d'effectuer
                        cette action ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal">Annuler</button>
                    <button type="button" class="btn btn-danger"
                        wire:click="deleteUser('{{ $userIdToDelete }}')">Supprimer</button>
                </div>
            </div>
        </div>
    </div>
</div>
