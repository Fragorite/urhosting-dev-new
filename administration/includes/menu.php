<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">UrHosting <sup>ADMINISTRATION</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="/urhosting-dev-new/administration/index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Informations
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Statistiques</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/urhosting-dev-new/administration/statistiques/stats-billing.php">Ventes</a>
            <a class="collapse-item" href="/urhosting-dev-new/administration/statistiques/stats-support.php">Support</a>
            <a class="collapse-item" href="/urhosting-dev-new/administration/statistiques/stats-site.php">Site</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Réseaux</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Voir l'état des services</h6>
            <a class="collapse-item" href="#">Ajouter une alerte</a>
            <a class="collapse-item" href="#">Voir les alertes</a>
            <a class="collapse-item" href="#">Historique des alertes</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Gestion
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Produits / Services</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Groupes</h6>
            <a class="collapse-item" href="/urhosting-dev-new/administration/products/addProductGroup.php">Ajouter un groupe</a>
            <a class="collapse-item" href="/urhosting-dev-new/administration/products/listProductGroup.php">Liste des groupes</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Produits</h6>
            <a class="collapse-item" href="/urhosting-dev-new/administration/products/addProduct.php">Ajouter un produit</a>
            <a class="collapse-item" href="/urhosting-dev-new/administration/products/listProducts.php">Liste des produits</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNdd" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Nom de domaine</span>
        </a>
      <div id="collapseNdd" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion</h6>
            <a class="collapse-item" href="#">Ajouter un NDD</a>
            <a class="collapse-item" href="#">Liste des NDD</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Tags</h6>
            <a class="collapse-item" href="#">Ajouter un tag</a>
            <a class="collapse-item" href="#">Liste des tags</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseGestionSite" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Gestion du site</span>
        </a>
        <div id="collapseGestionSite" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Maintenance WEB</h6>
            <a class="collapse-item" href="#">Activer la maintenance</a>
            <a class="collapse-item" href="#">Historique des maintenances</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Promotions</h6>
            <a class="collapse-item" href="#">Activer la promotion</a>
            <a class="collapse-item" href="#">Historique des promotions</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Gestion de l'équipe
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseStaff" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Equipe administrative</span>
        </a>
        <div id="collapseStaff" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Ajouter un membre</a>
            <a class="collapse-item" href="#">Liste des membres</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePerms" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Permissions</span>
        </a>
        <div id="collapsePerms" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="#">Fonctions & Attributions</a>
            <a class="collapse-item" href="#">Changer les permissions</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Support
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSupport" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Base de connaissance</span>
        </a>
        <div id="collapseSupport" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Catégories</h6>
            <a class="collapse-item" href="/urhosting-dev-new/administration/knowledge-base/addCategory.php">Ajouter une catégories</a>
            <a class="collapse-item" href="/urhosting-dev-new/administration/knowledge-base/listCategories.php">Liste des catégories</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Tutoriels</h6>
            <a class="collapse-item" href="/urhosting-dev-new/administration/knowledge-base/addTutorial.php">Ajouter un tutoriel</a>
            <a class="collapse-item" href="/urhosting-dev-new/administration/knowledge-base/listTutorials.php">Liste des tutoriels</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePartner" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Partenariats</span>
        </a>
        <div id="collapsePartner" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/urhosting-dev-new/administration/partners/addPartner.php">Ajouter un partenaire</a>
            <a class="collapse-item" href="/urhosting-dev-new/administration/partners/listPartners.php">Liste des partenaires</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>