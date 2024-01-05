<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'page non definie' }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <style>
        body {
            background-image: url('{{ asset('dist/img/login.webp') }}');
            background-size: cover;
            /* Pour couvrir tout l'arrière-plan */
            background-position: center;
            /* Pour centrer l'image */
            background-repeat: no-repeat;
            /* Pour éviter la répétition de l'image */
        }
    </style>
    {{-- @yield('css') --}}
</head>

<body class="layout-fixed sidebar-open">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-danger">
                    <div class="card-header bg-danger text-white text-center">
                        <h4>Gestion Station</h4>
                        <p class="mb-0">Connectez-vous</p>
                    </div>
                    <div class="card-body">

                        @if (Session::has('message'))
                            <div class="alert alert-danger">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                        <form wire:submit.prevent="login">

                            <div class="mb-3">
                                <label for="tel" class="form-label">Numéro de Téléphone :</label>
                                <input type="tel" wire:model="tel" class="form-control" id="tel" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe :</label>
                                <input type="password" wire:model="password" class="form-control" id="password"
                                    required>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" wire:model="remember" id="remember">
                                <label class="form-check-label" for="remember">Se souvenir de moi</label>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-danger">Se connecter</button>
                            </div>

                            <div class="mt-3 text-center">
                                <a href="#" class="text-decoration-none text-danger">Mot de passe oublié ?</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    @yield('script')
</body>

</html>
