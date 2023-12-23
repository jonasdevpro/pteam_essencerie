<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">STATION SHELL</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a wire:navigate href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a wire:navigate href="{{ route('employeur') }}" class="nav-link">
                        <i class="fa-solid fa-users nav-icon"></i>
                        <p>
                            EMPLOYERS
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-book nav-icon"></i>
                        <p>
                            VENTES
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vente.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Liste</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('vente.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ajouter</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item @if (Str::startsWith(Route::currentRouteName(), 'config.')) menu-is-opening menu-open @endif">
                    <a href="#" class="nav-link @if (Str::startsWith(Route::currentRouteName(), 'config.')) active @endif">
                        <i class="fa-solid fa-gear nav-icon"></i>
                        <p>
                            CONFIGURATION
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('config.index') }}"
                                class="nav-link @if (Route::is('config.index')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Général</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('config.pompes') }}"
                                class="nav-link @if (Route::is('config.pompes')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pompes</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="{{ route('config.cuves') }}"
                                class="nav-link @if (Route::is('config.cuves')) active @endif">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cuves</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item menu-is-opening menu-open">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-book nav-icon"></i>
                        <p>
                            produit
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: block;">
                        <li class="nav-item">
                            <a wire:navigate href="/create" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ajouter</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate href="/liste" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
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
