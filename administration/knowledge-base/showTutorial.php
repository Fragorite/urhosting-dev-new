<?php include('../includes/config.php');
    $redirect = "../";
    if(isset($userinfo['id'])){
        if(isset($_GET['id'])){
            $getId = intval($_GET['id']);
            $search = $db->query('SELECT * FROM site_knowledgebase_tutorials WHERE id = '.$getId);
            if($search->rowCount() == 1){
                $tutorial = $search->fetch(PDO::FETCH_ASSOC);

                $categorySearch = $db->query('SELECT * FROM site_knowledgebase_categories WHERE id = "'.$tutorial['idCategory'].'"');
                $category = $categorySearch->fetch(PDO::FETCH_ASSOC);

                if(isset($_GET['hidden'])){
                    $updateHidden = intval($_GET['hidden']);
                    if($updateHidden == 1)
                    {
                        $update = $db->query('UPDATE site_knowledgebase_tutorials SET hidden = 1 WHERE id = "'.$tutorial['id'].'"');
                    } else {
                        $update = $db->query('UPDATE site_knowledgebase_tutorials SET hidden = 0 WHERE id = "'.$tutorial['id'].'"');
                    }
                    header('Location: ?id='.$tutorial['id'].'&updateHidden='.$updateHidden);
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

  <title>UrHosting - Informations tutoriel</title>

  <!-- Custom fonts for this template-->
  <link href="<?= $redirect; ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= $redirect; ?>css/sb-admin-2.min.css" rel="stylesheet">

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
            <h1 class="h3 mb-0 text-gray-800">Tutoriel - <?= $tutorial['title']; ?></h1>
          </div>
          <!-- Content Row -->
          <?php
                if(isset($_GET['updateHidden'])){
                ?>
                 <div class="alert alert-dismissible alert-success">
                <button class="close" type="button" data-dismiss="alert">&times;</button>
            <?php
                    if($_GET['updateHidden'] == 1){
               ?>
                    Le tutoriel est désormais <b>invisible.</b> Vous pouvez le mettre visible à tout moment.
               <?php
                    } else {
                ?>
                   Le tutorial est désormais <b>visible</b>. Vous pouvez le modifier à tout moment.
               <?php
                    }
                ?>
                </div>
                <?php
                }
              ?>
          <div class="row">
              

          <!-- Page Heading -->
            <div class="card shadow m-3">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardTutorialInfos" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Informations sur le tutoriel</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardTutorialInfos">
                    <div class="card-body">
                        <u>Titre :</u> <b><?= $tutorial['title']; ?></b><br />
                        <u>Date de publication :</u> <b><?= $tutorial['date']; ?></b><br />
                        <u>Catégorie parente :</u> <b><?= $category['title']; ?></b><br />
                        <u>Visibilité :</u> <b><?php if($tutorial['hidden'] == 1) { echo '<font color="red">Caché</font>'; } else { echo '<font color="green">Visible</font>'; } ?></b>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow m-3" style="max-width: 1000px;">
                <!-- Card Header - Accordion -->
                <a href="#collapseCardTutorialContent" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Contenu du tutoriel</h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseCardTutorialContent">
                    <div class="card-body">
                        <p>
                            <?= $tutorial['content']; ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-3" style="max-width: 500px;">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardInformationsActions" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardActions">
                <div class="card-body">
                    <?php
                        if($tutorial['hidden'] == 0){
                    ?>
                    <a href="?id=<?= $tutorial['id']; ?>&hidden=1" class="btn btn-success btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text">Rendre visible le tutoriel</span>
                    </a><br />
                    <?php
                        } else {
                    ?>
                    <div class="my-2"></div>
                    <a href="?id=<?= $tutorial['id']; ?>&hidden=0" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-times"></i>
                        </span>
                        <span class="text">Rendre invisible le tutoriel</span>
                    </a><br/>
                    <?php
                        }
                    ?>
                    <div class="my-2"></div>
                    <a href="#" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-edit"></i>
                        </span>
                        <span class="text">Modifier le tutoriel</span>
                    </a><br/>
                    <div class="my-2"></div>
                    <a href="listTutorials.php" class="btn btn-secondary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-door-open"></i>
                        </span>
                        <span class="text">Retour</span>
                    </a>
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

</body>

</html>
<?php
            } else {
                header('Location: listTutorials.php');
            }
        } else {
            header('Location: listTutorials.php');
        }
    } else {
        header('Location: ../login.php');
    }
?>
