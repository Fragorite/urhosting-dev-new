<?php include('config.php'); 
    if(isset($_POST['disconnect'])) {
        session_destroy();
        die('<META HTTP-equiv="refresh" content=0;URL="login.php">');
    }

    $searchAlerts = $db->prepare('SELECT * FROM site_alerts_administration WHERE user_id = :user_id AND hidden = 0');
    $searchAlerts->execute(array(
            'user_id' => $userinfo['id']
    ));
    $numAlerts = $searchAlerts->rowCount();
    if($numAlerts == 0){
        $countAlerts = "";
    } else {
        $countAlerts = $numAlerts;
    }
    if(isset($_GET['deleteAllAlerts']) && !empty($_GET['deleteAllAlerts'])){
        $selectAllAlerts = $db->prepare('SELECT * FROM site_alerts_administration WHERE user_id = :user_id AND hidden = 0');
        $selectAllAlerts->execute(array(
            'user_id' => $userinfo['id']
        ));
        while($alert = $selectAllAlerts->fetch(PDO::FETCH_ASSOC)){
            $updateAlert = $db->prepare('UPDATE site_alerts_administration SET hidden = 1 WHERE id = :id');
            $updateAlert->execute(array(
                'id' => $alert['id']
            ));
        }
        echo "<META HTTP-equiv='refresh' content=0;URL='?deleteAllAlertsSuccess=1'>";
    }
?>

<script type="text/javascript">
    function refresh(){

    }
</script>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Alerts -->
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bell fa-fw"></i>
      <!-- Counter - Alerts -->
      <span class="badge badge-danger badge-counter"><?= $countAlerts; ?></span>
    </a>
    <!-- Dropdown - Alerts -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
      <h6 class="dropdown-header">
        Centre d'alertes
      </h6>
        <?php
            if($countAlerts > 0){
                while($alert = $searchAlerts->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <a class="dropdown-item d-flex align-items-center" href="<?= $alert['link']; ?>">
                        <div class="mr-3">
                            <div class="icon-circle bg-<?= $alert['icon_color']; ?>">
                                <i class="<?= $alert['icon']; ?> text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="small text-gray-500"><?= $alert['created_at']; ?></div>
                            <span class="font-weight-bold"><?= $alert['title']; ?></span>
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Afficher toutes les alertes</a>
                    <a class="dropdown-item text-center small text-gray-500" href="?deleteAllAlerts=1">Supprimer toutes les alertes</a>
                <?php
                }
            } else {
                ?>
                <i class="dropdown-item d-flex align-items-center mr-3">Vous n'avez pas de nouvelle alerte...</i>
        <?php
            }
        ?>
    </div>
  </li>

  <!-- Nav Item - Messages -->
  <li class="nav-item dropdown no-arrow mx-1">
    <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-envelope fa-fw"></i>
      <!-- Counter - Messages -->
      <span class="badge badge-danger badge-counter">7</span>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
      <h6 class="dropdown-header">
        Message Center
      </h6>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
          <div class="status-indicator bg-success"></div>
        </div>
        <div class="font-weight-bold">
          <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
          <div class="small text-gray-500">Emily Fowler · 58m</div>
        </div>
      </a>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
          <div class="status-indicator"></div>
        </div>
        <div>
          <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
          <div class="small text-gray-500">Jae Chun · 1d</div>
        </div>
      </a>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
          <div class="status-indicator bg-warning"></div>
        </div>
        <div>
          <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
          <div class="small text-gray-500">Morgan Alvarez · 2d</div>
        </div>
      </a>
      <a class="dropdown-item d-flex align-items-center" href="#">
        <div class="dropdown-list-image mr-3">
          <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
          <div class="status-indicator bg-success"></div>
        </div>
        <div>
          <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
          <div class="small text-gray-500">Chicken the Dog · 2w</div>
        </div>
      </a>
      <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
    </div>
  </li>

  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $userinfo['username']; ?></span>
      <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60" alt="Mon profil">
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <a class="dropdown-item" href="#">
        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
        Mes permissions
      </a>
      <a class="dropdown-item" href="#">
        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
        Changer mes informations
      </a>
      <a class="dropdown-item" href="#">
        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
        Mon historique d'activité
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Déconnexion
      </a>
    </div>
  </li>

</ul>
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Prêt à vous déconnecter?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Cliquez sur "Déconnexion" afin de vous déconnecter de l'espace d'administration de UrHosting (IMPORTANT)</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Retour</button>
                <form method="POST">
                    <input type="submit" name="disconnect" value="Déconnexion" class="btn btn-primary"/>
                </form>
                </div>
            </div>
        </div>
    </div>

</nav>
     <?php include('functions/successOrError.php'); ?>