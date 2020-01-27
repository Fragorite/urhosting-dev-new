<?php include('../includes/config.php');
  if(isset($userinfo['id'])){
      $redirect = "../";
      if(isset($_GET['cancel'])){
        $part = intval($_GET['cancel']);
        $cancel = $db->query('UPDATE site_partners SET active = 0 WHERE id = "'.$part.'"');
        header('Location: ?cancelPartnerContractSuccess');
      }
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UrHosting - Liste des partenaires</title>

  <!-- Custom fonts for this template-->
  <link href="<?= $redirect; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= $redirect; ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= $redirect; ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php include($redirect.'includes/menu.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php include($redirect.'includes/navbartop.php'); ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
           <!-- Page Heading -->
           <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LISTE DES PARTENAIRES</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active show" href="#partner-active" data-toggle="tab">Contrats actifs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#partner-cancelled" data-toggle="tab">Contrats terminés</a>
            </li>
        </ul>
          <!-- Content Row -->
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade active show" id="partner-active">
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Dossier</th>
                      <th>Statut</th>
                      <th>Validité</th>
                      <th>Déclarant</th>
                      <th>Mail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $search = $db->query('SELECT * FROM site_partners WHERE active=1');
                        while($partner = $search->fetch(PDO::FETCH_ASSOC)){
                            if($partner['projectStatus'] == 1){
                                $status = "Entreprise";
                            }
                            else if($partner['projectStatus'] == 2){
                                $status = "Association";
                            } else {
                                $status = "Particulier";
                            }
                    ?>
                    <tr>
                      <td><?php echo $partner['contractNumber'].'/'.$partner['contractVersion'].'/'.$partner['contractYear']; ?></td>
                      <td><?= $status; ?></td>
                      <td><b><font color="green">En cours</font></b></td>
                      <td><?php echo strtoupper($partner['userLastName']).' '.$partner['userName']; ?></td>
                      <td><?= $partner['userMail']; ?></td>
                      <td>
                        <a href="showPartner.php?id=<?= $partner['id']; ?>" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="?cancel=<?= $partner['id']; ?>" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-times"></i>
                        </a>

                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
            <div class="tab-pane fade" id="partner-cancelled">
            <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Dossier</th>
                      <th>Statut</th>
                      <th>Validité</th>
                      <th>Déclarant</th>
                      <th>Mail</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $search = $db->query('SELECT * FROM site_partners WHERE active = 0');
                        while($partner = $search->fetch(PDO::FETCH_ASSOC)){
                            if($partner['projectStatus'] == 1){
                                $status = "Entreprise";
                            }
                            else if($partner['projectStatus'] == 2){
                                $status = "Association";
                            } else {
                                $status = "Particulier";
                            }
                    ?>
                    <tr>
                      <td><?php echo $partner['contractNumber'].'/'.$partner['contractVersion'].'/'.$partner['contractYear']; ?></td>
                      <td><?= $status; ?></td>
                      <td><b><font color="red">Terminé</font></b></td>
                      <td><?php echo strtoupper($partner['userLastName']).' '.$partner['userName']; ?></td>
                      <td><?= $partner['userMail']; ?></td>
                      <td>
                        <a href="showPartner.php?id=<?= $partner['id']; ?>" class="btn btn-info btn-circle btn-sm">
                            <i class="fas fa-info-circle"></i>
                        </a>
                        <a href="#" class="btn btn-success btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#" class="btn btn-danger btn-circle btn-sm">
                            <i class="fas fa-times"></i>
                        </a>

                      </td>
                    </tr>
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
              </div>
                      </div>
            </div>
          </div>
                      </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php include($redirect.'includes/footer.php'); ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Bootstrap core JavaScript-->
  <script src="<?= $redirect; ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= $redirect; ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= $redirect; ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= $redirect; ?>js/sb-admin-2.min.js"></script>

  <script src="<?= $redirect; ?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?= $redirect; ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= $redirect; ?>js/demo/datatables-demo.js"></script>

</body>

</html>
<?php
  } else {
    header('Location: ../login.php');
  }
?>
