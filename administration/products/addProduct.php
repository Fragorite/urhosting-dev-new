<?php include('../includes/config.php');
	$redirect = "../";
	if(isset($userinfo['id'])){
	    if(isset($_POST['formProductAdd'])){
	        $groupId = intval($_GET['id']);
	        $productIdWhmcs = $_POST['productIdWhmcs'];
	        $searchExist = $db->query('SELECT * FROM site_products WHERE productIdWhmcs = "'.$productIdWhmcs.'"');
	        $productExist = $searchExist->rowCount();
	        if($productExist == 0){
                $file_ext = explode('.', $_FILES['imageAddFile']['name']);
                $file_ext = strtolower(end($file_ext));

                $newName = uniqid() . '.' . $file_ext;
                move_uploaded_file($_FILES['imageAddFile']['tmp_name'], 'images/' . $newName);

                // FIN FICHIER
                $createdAt = date('d/m/Y à H:i');
                $titleAdd = htmlspecialchars($_POST['titleAdd']);
                $description = htmlspecialchars($_POST['contentAdd']);
                if(isset($_POST['addProcess']) && !empty($_POST['addProcess'])) { $addProcess = $_POST['addProcess']; } else { $addProcess = ''; }
                if(isset($_POST['addRam']) && !empty($_POST['addRam'])) { $addRam = $_POST['addRam']; } else { $addRam = ''; }
                if(isset($_POST['addStockage']) && !empty($_POST['addStockage'])) { $addStockage = $_POST['addStockage']; } else { $addStockage = ''; }
                if(isset($_POST['addSlots']) && !empty($_POST['addSlots'])) { $addSlots = $_POST['addSlots']; } else { $addSlots = ''; }
                if(isset($_POST['addDatabase']) && !empty($_POST['addDatabase'])) { $addDatabase = $_POST['addDatabase']; } else { $addDatabase = ''; }
                if(isset($_POST['addBandwith']) && !empty($_POST['addBandwith'])) { $addBandwith = $_POST['addBandwith']; } else { $addBandwith = ''; }
                $insert = $db->prepare('INSERT INTO site_products(title,description,created_at,productIdWhmcs,groupId,addProcess,addRam,addStockage,addSlots,addDatabase,addBandwith,image) VALUES (:title,:description,:created_at,:productIdWhmcs,:groupId,:addProcess,:addRam,:addStockage,:addSlots,:addDatabase,:addBandwith,:image)');
                $insert->execute(array(
                    'title'         => $titleAdd,
                    'description'   => $description,
                    'created_at'    => $createdAt,
                    'productIdWhmcs'=> $productIdWhmcs,
                    'groupId'       => $groupId,
                    'addProcess'    => $addProcess,
                    'addRam'        => $addRam,
                    'addStockage'   => $addStockage,
                    'addSlots'      => $addSlots,
                    'addDatabase'   => $addDatabase,
                    'addBandwith'   => $addBandwith,
                    'image'         => $newName
                ));
                header('Location: listProducts.php?productCreate');

            } else {
	            $error = "Un produit a déjà été créé avec cet ID ! Merci de supprimer l'ancien ou de le modifier le précédent.";
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

  <title>UrHosting - Ajouter un produit</title>

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
            <h1 class="h3 mb-0 text-gray-800">Ajouter un produit</h1>
          </div>
            <?php
            if(isset($_GET['id']) && !empty($_GET['id'])) {
                $getId = intval($_GET['id']);
                $searchGroup = $db->query('SELECT * FROM site_products_groups WHERE id = "'.$getId.'"');
                $groupExist = $searchGroup->rowCount();
                if($groupExist == 0){
                    header('Location: addProduct.php');
                }
                $group = $searchGroup->fetch(PDO::FETCH_ASSOC);
                ?>
                <!-- Content Row -->
                <div class="row">
                    <form method="POST" class="tutorial">
                        <table>
                            <tr>
                                <th>
                                    <div class="form-group <?php if (isset($errors['titleAdd'])) {
                                        echo 'has-danger';
                                    } ?>">
                                        <label class="col-sm-2 col-form-label" for="titleLabel">Nom</label>
                                        <input type="text" class="form-control form-control-tutorial <?php if (isset($errors['titleAdd'])) {
                                            echo 'is-invalid';
                                        } ?>" id="titleLabel" name="titleAdd" placeholder="Nom du produit" style="width: 300px;">
                                        <div class="invalid-feedback"><?= $errors['titleAdd']; ?></div>
                                    </div>
                                </th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th>
                                    <div class="form-group <?php if (isset($errors['productIdWhmcs'])) {
                                        echo 'has-danger';
                                    } ?>">
                                        <label class="col-form-label" for="titleLabel">ID WHMCS service</label>
                                        <input type="text" class="form-control form-control-tutorial <?php if (isset($errors['productIdWhmcs'])) {
                                            echo 'is-invalid';
                                        } ?>" id="titleLabel"
                                               name="productIdWhmcs" placeholder="ID WHMCS du produit" style="width: 300px;">
                                        <div class="invalid-feedback"><?= $errors['productIdWhmcs']; ?></div>
                                    </div>
                                </th>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <th>
                                    <div class="form-group">
                                        <label for="contentLabel">Courte description</label>
                                        <textarea class="form-control form-control-tutorial <?php if (isset($errors['contentAdd'])) {
                                            echo 'is-invalid';
                                        } ?>" id="contentLabel" rows="10" name="contentAdd" style="width: 600px;"></textarea>
                                        <div class="invalid-feedback"><?= $errors['contentAdd']; ?></div>
                                    </div>
                                </th>
                            </tr>
                        </table>
                        <?php
                        if($group['addProcess'] == 1) {
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group <?php if (isset($errors['addProcess'])) {
                                            echo 'has-danger';
                                        } ?>">
                                            <label class="col-sm-2 col-form-label" for="addProcess">Processeur</label>
                                            <input type="text" class="form-control form-control-tutorial <?php if (isset($errors['addProcess'])) {
                                                echo 'is-invalid';
                                            } ?>" id="addProcess" name="addProcess" placeholder="Nombre de processeur" style="width: 300px;">
                                            <div class="invalid-feedback"><?= $errors['addProcess']; ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <?php
                        }
                        if($group['addRam'] == 1) {
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group <?php if (isset($errors['addRam'])) {
                                            echo 'has-danger';
                                        } ?>">
                                            <label class="col-form-label" for="addRam">Mémoire Vive</label>
                                            <input type="text" class="form-control form-control-tutorial <?php if (isset($errors['addRam'])) {
                                                echo 'is-invalid';
                                            } ?>" id="addRam" name="addRam" placeholder="Nombre de Go" style="width: 300px;">
                                            <div class="invalid-feedback"><?= $errors['addRam']; ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <?php
                        }
                        if($group['addStockage'] == 1) {
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group <?php if (isset($errors['addStockage'])) {
                                            echo 'has-danger';
                                        } ?>">
                                            <label class="col-sm-2 col-form-label" for="addStockage">Stockage</label>
                                            <input type="text" class="form-control form-control-tutorial <?php if (isset($errors['addStockage'])) {
                                                echo 'is-invalid';
                                            } ?>" id="addStockage" name="addStockage" placeholder="Nombre de Go" style="width: 300px;">
                                            <div class="invalid-feedback"><?= $errors['addStockage']; ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <?php
                        }
                        if($group['addSlots'] == 1) {
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group <?php if (isset($errors['addSlots'])) {
                                            echo 'has-danger';
                                        } ?>">
                                            <label class=" col-form-label" for="addSlots">Joueurs MAX</label>
                                            <input type="number" class="form-control form-control-tutorial <?php if (isset($errors['addSlots'])) {
                                                echo 'is-invalid';
                                            } ?>" id="addSlots" name="addSlots" placeholder="Nombre de joueurs MAX" style="width: 300px;">
                                            <div class="invalid-feedback"><?= $errors['addSlots']; ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <?php
                        }
                        if($group['addDatabase'] == 1) {
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group <?php if (isset($errors['addDatabase'])) {
                                            echo 'has-danger';
                                        } ?>">
                                            <label class="col-form-label" for="addProcess">Base(s) de données</label>
                                            <input type="number" class="form-control form-control-tutorial <?php if (isset($errors['addDatabase'])) {
                                                echo 'is-invalid';
                                            } ?>" id="addDatabase" name="addDatabase" placeholder="Nombre de base de donnée" style="width: 300px;">
                                            <div class="invalid-feedback"><?= $errors['addDatabase']; ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <?php
                        }
                        if($group['addBandwith'] == 1) {
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group <?php if (isset($errors['addBandwith'])) {
                                            echo 'has-danger';
                                        } ?>">
                                            <label class="col-form-label" for="addBandwith">Bande passante</label>
                                            <input type="number" class="form-control form-control-tutorial <?php if (isset($errors['addBandwith'])) {
                                                echo 'is-invalid';
                                            } ?>" id="addBandwith" name="addBandwith" placeholder="Nombre de Mbps" style="width: 300px;">
                                            <div class="invalid-feedback"><?= $errors['addBandwith']; ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <?php
                        }
                        ?>
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
                                            <label class="custom-control-label" for="hiddenSwitch">Produit caché</label>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                        </table>
                        <input type="submit" class="btn btn-success btn-user btn-block" name="formProductAdd" value="Ajouter le produit"/>
                    </form>
                    <div class="d-flex justify-content-center"><a href="listProducts.php"><input type="submit" class="btn btn-secondary btn-user btn-block" value="Retour"/></a></div>
                </div>
                <?php
            } else {
                $selectAllGroups = $db->query('SELECT * FROM site_products_groups');
                while($group = $selectAllGroups->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <a href="?id=<?= $group['id']; ?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                      <i class="fas fa-arrow-right"></i>
                    </span>
                        <span class="text"><?= $group['title'] ?></span>
                    </a>
                    <?php
                }
            }
            ?>
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