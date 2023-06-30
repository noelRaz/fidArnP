<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
      <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

         <!-- Settings Dropdown -->

      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link" active="request()->routeIs('dashboard')">
              <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>Accueil</p>
            </a>
          </li>

          <li class="nav-item">
            <a href="/dashboard" class="nav-link" active="request()->routeIs('dashboard')">
              <i class="nav-icon fas fa-user-tie"></i>
              <p>
                Personnels
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/pointpersonnel" class="nav-link" active="request()->routeIs('Pointpers')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pointage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listepersonnel" class="nav-link" active="request()->routeIs('Listepers')">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item">
          <a href="/dashboard" class="nav-link" active="request()->routeIs('dashboard')">
              <i class="nav-icon fas fa-user-friends"></i>
              <p>
                A.S/O.S
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/pointAS" class="nav-link" active="request()->routeIs('PointAS')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pointage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listeAS" class="nav-link" active="request()->routeIs('ListeAS')">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/dashboard" class="nav-link" active="request()->routeIs('dashboard')">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Visiteur
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/visiteur" class="nav-link" active="request()->routeIs('Visiteur')">
                  <i class="fas fa-plus nav-icon"></i>
                  <p>Nouveau</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listeVisiteur" class="nav-link" active="request()->routeIs('ListeVisiteur')">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/dashboard" class="nav-link" active="request()->routeIs('dashboard')">
              <i class="nav-icon fas fa-truck"></i>
              <p>
                Voiture
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/mouveVoi" class="nav-link" active="request()->routeIs('MouvVoi')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Mouvement</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listeVoi" class="nav-link" active="request()->routeIs('ListeVoi')">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="/dashboard" class="nav-link" active="request()->routeIs('dashboard')">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Colis
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/coliArri" class="nav-link" active="request()->routeIs('ColiArri')">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Arriver</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/listeColis" class="nav-link" active="request()->routeIs('ListeColis')">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if(Auth::user()->admin == '1') {?>
          <li class="nav-item">
            <a href="/dashboard" class="nav-link" active="request()->routeIs('dashboard')">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Utilisateur
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/ajoutUser" class="nav-link" active="request()->routeIs('AjoutUser')">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Nouveau</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/utilisateur" class="nav-link" active="request()->routeIs('Utilisateur')">
                  <i class="far fa-list-alt nav-icon"></i>
                  <p>Liste</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
