<div class="modal show" tabindex="-1" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Confirmation</h5>
          <button wire:click='closeModal' type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Voulez-vous supprimé cette pompe ?</p>
        </div>
        <div class="modal-footer">
          <button wire:click='closeModal' type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
          <button wire:click="delete('{{ $pump->id }}')" type="button" class="btn btn-primary">Oui</button>
        </div>
      </div>
    </div>
  </div>
<div class="modal-backdrop fade show"></div>

