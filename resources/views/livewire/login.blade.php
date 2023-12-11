<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
    

    <div class="card-header bg-primary text-white">{{ __('Connectez-vous') }}</div>

                <div class="card-body">
                    <form wire:submit.prevent="login">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        

                        <div class="mb-3">
                            <label for="tel" class="form-label">Téléphone:</label>
                            <input type="number" wire:model="tel" class="form-control" id="tel" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe:</label>
                            <input type="password" wire:model="password" class="form-control" id="password" required>
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" wire:model="remember" id="remember">
                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                        </div>

                        <button type="submit" class="btn btn-primary">Se connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
