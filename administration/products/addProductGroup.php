<?php include('../includes/config.php');
	$redirect = "../";
	if(isset($userinfo['id'])){
        if(isset($_POST['formProductsGroupAdd'])){
            if(!empty($_POST['titleAdd']) || !empty($_POST['contentAdd']) || !empty($_POST['grpSelectAdd'])){
                $searchWhmcsID = $db->query('SELECT * FROM tblproductgroups WHERE id = "'.$_POST['grpSelectAdd'].'"');
                $grpWhmcsExist = $searchWhmcsID->rowCount();
                if($grpWhmcsExist == 1){
                    $searchGroupExist = $db->query('SELECT * FROM site_products_groups WHERE groupIdWhmcs = "'.$_POST['grpSelectAdd'].'"');
                    $grpExist = $searchGroupExist->rowCount();
                    if($grpExist == 0){
                        // FICHIER
                        $file_ext = explode('.', $_FILES['imageAddFile']['name']);
                        $file_ext = strtolower(end($file_ext));

                            $newName = uniqid() . '.' . $file_ext;
                            move_uploaded_file($_FILES['imageAddFile']['tmp_name'], 'images/' . $newName);

                            // FIN FICHIER
                            $grpTitle = htmlspecialchars($_POST['titleAdd']);
                            $grpDescription = htmlspecialchars($_POST['contentAdd']);
                            $grpIdWhmcs = $_POST['grpSelectAdd'];
                            $createdAt = date('d/m/Y à H:i');
                            $pageName = $_POST['pageName'];
                            if (isset($_POST['hiddenSwitch']) && $_POST['hiddenSwitch'] == "on") {
                                $hidden = 1;
                            } else {
                                $hidden = 0;
                            }
                            if (isset($_POST['addRam']) && $_POST['addRam'] == "on") {
                                $addRam = 1;
                            } else {
                                $addRam = 0;
                            }
                            if (isset($_POST['addStockage']) && $_POST['addStockage'] == "on") {
                                $addStockage = 1;
                            } else {
                                $addStockage = 0;
                            }
                            if (isset($_POST['addProcess']) && $_POST['addProcess'] == "on") {
                                $addProcess = 1;
                            } else {
                                $addProcess = 0;
                            }
                            if (isset($_POST['addSlots']) && $_POST['addSlots'] == "on") {
                                $addSlots = 1;
                            } else {
                                $addSlots = 0;
                            }
                            if (isset($_POST['addDatabase']) && $_POST['addDatabase'] == "on") {
                                $addDatabase = 1;
                            } else {
                                $addDatabase = 0;
                            }
                            if (isset($_POST['addBandwith']) && $_POST['addBandwith'] == "on") {
                                $addBandwith = 1;
                            } else {
                                $addBandwith = 0;
                            }
                            if (isset($_POST['typeServersGaming']) && $_POST['typeServersGaming'] == "on") {
                                $typeServersGaming = 1;
                            } else {
                                $typeServersGaming = 0;
                            }
                            if (isset($_POST['typeServersVPS']) && $_POST['typeServersVPS'] == "on") {
                                $typeServersVPS = 1;
                            } else {
                                $typeServersVPS = 0;
                            }
                            if (isset($_POST['typeWeb']) && $_POST['typeWeb'] == "on") {
                                $typeWeb = 1;
                            } else {
                                $typeWeb = 0;
                            }
                            if (isset($_POST['typeOthers']) && $_POST['typeOthers'] == "on") {
                                $typeOthers = 1;
                            } else {
                                $typeOthers = 0;
                            }

                            $insertGroup = $db->prepare('INSERT INTO site_products_groups(title,description,groupIdWhmcs,hidden,created_at, typeServersGaming, typeServersVPS, typeWeb, typeOthers, img, pageName, addRam, addStockage, addBandwith, addSlots, addProcess, addDatabase) VALUES (:title, :description, :groupIdWhmcs, :hidden, :created_at, :typeServersGaming, :typeServersVPS, :typeWeb, :typeOthers, :img, :pageName, :addRam, :addStockage, :addBandwith, :addSlots, :addProcess, :addDatabase)');
                            $insertGroup->execute(array(
                                'title' => $grpTitle,
                                'description' => $grpDescription,
                                'groupIdWhmcs' => $grpIdWhmcs,
                                'hidden' => $hidden,
                                'created_at' => $createdAt,
                                'typeServersGaming' => $typeServersGaming,
                                'typeServersVPS' => $typeServersVPS,
                                'typeWeb' => $typeWeb,
                                'typeOthers' => $typeOthers,
                                'img' => $newName,
                                'pageName' => $pageName,
                                'addRam' => $addRam,
                                'addStockage' => $addStockage,
                                'addBandwith' => $addBandwith,
                                'addSlots' => $addSlots,
                                'addProcess' => $addProcess,
                                'addDatabase' => $addDatabase
                            ));
                            header('Location: listProductGroups.php');
                    } else {
                        $error = "Un groupe correspondant à cet ID WHMCS a déjà été créé !";
                    }
                } else {
                    $error = "Aucun groupe n'existe sur WHMCS avec cet ID !";
                }
            } else {
                $error = "Vous devez renseigner tous les champs !";
            }
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

  <title>UrHosting - Ajouter un groupe de produit</title>

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
            <h1 class="h3 mb-0 text-gray-800">Ajouter un groupe de produit</h1>
          </div>
		  <!-- Content Row -->
		  <div class="row">
		  <form method="POST" class="tutorial" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th>
                                <div class="form-group <?php if(isset($errors['titleAdd'])) { echo 'has-danger'; } ?>">
                                <label class="col-form-label" for="titleLabel">Nom</label>
                                    <input required type="text" class="form-control form-control-tutorial <?php if(isset($errors['titleAdd'])) { echo 'is-invalid'; } ?>" id="titleLabel"
                                           name="titleAdd" placeholder="Nom du groupe" style="width: 300px;">
                                    <div class="invalid-feedback"><?= $errors['titleAdd']; ?></div>
                                </div>
                            </th>
                        </tr>
                    </table>
                  <div class="form-group">
                      <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch10" name="typeServersGaming">
                          <label class="custom-control-label" for="customSwitch10">TYPE : Serveur Gaming</label>
                      </div>
                      <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch20" name="typeServersVPS">
                          <label class="custom-control-label" for="customSwitch20">TYPE : Serveur VPS</label>
                      </div>
                      <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch30" name="typeWeb">
                          <label class="custom-control-label" for="customSwitch30">TYPE : Web</label>
                      </div>
                      <div class="custom-control custom-switch">
                          <input type="checkbox" class="custom-control-input" id="customSwitch40" name="typeOthers">
                          <label class="custom-control-label" for="customSwitch40">TYPE : Autres</label>
                      </div>
                      <table>
                          <tr>
                              <th>
                                  <div class="form-group <?php if(isset($errors['pageName'])) { echo 'has-danger'; } ?>">
                                      <label class="col-form-label" for="titleLabel">Nom de la page (.php)</label>
                                      <input required type="text" class="form-control form-control-tutorial <?php if(isset($errors['pageName'])) { echo 'is-invalid'; } ?>" id="titleLabel"
                                             name="pageName" placeholder="Nom de la page avec extension .php" style="width: 300px;">
                                      <div class="invalid-feedback"><?= $errors['pageName']; ?></div>
                                  </div>
                              </th>
                          </tr>

              </div>
                    <table>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <label for="contentLabel">Courte description</label>
                                    <textarea required class="form-control form-control-tutorial <?php if(isset($errors['contentAdd'])) { echo 'is-invalid'; } ?>" id="contentLabel"
                                              rows="10" name="contentAdd" style="width: 600px;"></textarea>
                                    <div class="invalid-feedback"><?= $errors['contentAdd']; ?></div>
                                </div>
                            </th>
                        </tr>
					</table>
					<table>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <label for="catSelectLabel">WHMCS Groupe</label>
                                    <select class="form-control" id="grpSelectLabel" name="grpSelectAdd">
                                        <?php
                                        $grpSearch = $db->query('SELECT * FROM tblproductgroups');
                                        while($group = $grpSearch->fetch(PDO::FETCH_ASSOC)){
                                            ?>
                                            <option value="<?= $group['id']; ?>"><?= $group['name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </th>
                        </tr>
                    </table>
                      <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                      <div class="form-group">
                          <label for="contractPartnerFile">Image affichée</label>
                          <input class="form-control-file" id="contractPartnerFile" name="imageAddFile" aria-describedby="contractPartnerHelp" type="file">
                          <small class="form-text text-muted" id="contractPartnerHelp">Cette image sera affichée sur le site !</small>
                      </div>
                    <table>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="hiddenSwitch" id="hiddenSwitch">
                                        <label class="custom-control-label" for="hiddenSwitch">Groupe caché</label>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    </table>
                      <div class="form-group">
                          <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch1" name="addProcess">
                              <label class="custom-control-label" for="customSwitch1">Utilisation d'un processeur</label>
                          </div>
                          <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch2" name="addRam">
                              <label class="custom-control-label" for="customSwitch2">Utilisation de la RAM</label>
                          </div>
                          <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch3" name="addDatabase">
                              <label class="custom-control-label" for="customSwitch3">Utilisation de base de donnée</label>
                          </div>
                          <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch4" name="addSlots">
                              <label class="custom-control-label" for="customSwitch4">Utilisation de SLOTS</label>
                          </div>
                          <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch5" name="addStockage">
                              <label class="custom-control-label" for="customSwitch5">Utilisation de stockage</label>
                          </div>
                          <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" id="customSwitch6" name="addBandwith">
                              <label class="custom-control-label" for="customSwitch6">Utilisation de bande passante</label>
                          </div>

                      </div>
                    <input type="submit" class="btn btn-success btn-user btn-block" name="formProductsGroupAdd" value="Ajouter le groupe"/>
                </form>
                <div class="d-flex justify-content-center"><a href="listProductGroups.php"><input type="submit" class="btn btn-secondary btn-user btn-block" value="Retour"/></a></div>
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
    header('Location: '.$redirect.'login.php');
  }
?>
