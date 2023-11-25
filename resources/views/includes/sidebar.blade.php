<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a wire:navigate href="{{route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a> 
          </li>
          <li class="nav-item">
            <a wire:navigate href="{{route('employeur')}}" class="nav-link">
              <i class="fa-solid fa-users nav-icon"></i>
              <p>
                EMPLOYERS
              </p>
            </a>
          </li>
          <li class="nav-item menu-is-opening menu-open">
            <a href="#" class="nav-link">
              <i class="fa-solid fa-book nav-icon"></i>
              <p>
                VENTES
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: block;">
              <li class="nav-item">
                <a wire:navigate href="{{route('vente.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
              <li class="nav-item">
                <a wire:navigate href="{{route('vente.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ajouter</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a wire:navigate href="{{route('config')}}" class="nav-link">
              <i class="fa-solid fa-gear nav-icon"></i>
              <p>
                CONFIGURATION
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>