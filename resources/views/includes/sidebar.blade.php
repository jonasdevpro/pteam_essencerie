<aside class="main-sidebar elevation-4" style="background-color: #2e2727; color: white;">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="https://img.freepik.com/free-vector/save-fuel-pump-icon-petrol-station-sign-gas-station-sign-fuel-background_460848-14750.jpg?w=740&t=st=1703811446~exp=1703812046~hmac=ea02428bb1dd3af4edd42113bbe59c45b3d25e4efeae5759a0ae22d7e1a3d1a2"
            alt="Station" class="brand-image img-circle elevation-4" style="opacity: .8">
        <div class="brand-text-container">
            <p class="brand-text font-weight-bold">APRIL OIL</p>
        </div>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel d-flex">
            <div class="info">
                <p class="text-center text-success">Connecté</p>
                <p class="d-block text-white">Ouedraogo Abdoule Rasak</p>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a wire:navigate href="{{ route('dashboard') }}" class="nav-link text-white">
                        <i class="nav-icon fas fa-tachometer-alt text-white"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate href="{{ route('employeur') }}" class="nav-link text-white">
                        <i class="fa-solid fa-users nav-icon text-white"></i>
                        <p>
                            EMPLOYERS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link text-white">
                        <i class="fa-solid fa-book nav-icon text-white"></i>
                        <p>
                            VENTES
                            <i class="right fas fa-angle-left text-white"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vente.index') }}" class="nav-link text-white">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Liste</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vente.create') }}" class="nav-link text-white">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Str::startsWith(Route::currentRouteName(), 'config.')) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if (Str::startsWith(Route::currentRouteName(), 'config.')) active @endif text-white">
                        <i class="fa-solid fa-gear nav-icon text-white"></i>
                        <p>
                            CONFIGURATION
                            <i class="right fas fa-angle-left text-white"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('config.index') }}"
                                class="nav-link @if (Route::is('config.index')) active @endif text-white">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Général</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('config.pompes') }}"
                                class="nav-link @if (Route::is('config.pompes')) active @endif text-white">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Pompes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('config.cuves') }}"
                                class="nav-link @if (Route::is('config.cuves')) active @endif text-white">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>Cuves</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-is-opening menu-open">
                    <a href="#" class="nav-link text-white">
                        <i class="fa-solid fa-book nav-icon text-white"></i>
                        <p>
                            produit
                            <i class="right fas fa-angle-left text-white"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a wire:navigate href="/create" class="nav-link text-white">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="/liste" class="nav-link text-white">
                                <i class="far fa-circle nav-icon text-white"></i>
                                <p>liste</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
