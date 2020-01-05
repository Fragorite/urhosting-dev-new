<?php include('../includes/config.php');
    $redirect = "../";
    $errors = array();
    if(isset($userinfo['id'])){
        if(isset($_POST['formCategoryAdd'])){
            if(!empty($_POST['titleAdd'])){
                if(!empty($_POST['descAdd'])){
                    $title = $_POST['titleAdd'];
                    $description = $_POST['descAdd'];
                    if(isset($_POST['catSelectAdd'])){
                        $idcat = $_POST['catSelectAdd'];
                        $subcat = 1;
                    } else {
                        $idcat = 0;
                        $subcat = 0;
                    }
                    if(isset($_POST['hiddenSwitch']) && $_POST['hiddenSwitch'] == "on"){
                        $hidden = 1;
                    } else {
                        $hidden = 0;
                    }
                    $insertCat = $db->prepare('INSERT INTO site_knowledgebase_categories(title, description, subcat, idcat, hidden) VALUES (:title, :description, :subcat, :idcat, :hidden)');
                    $insertCat->execute(array(
                        'title'         => $title,
                        'description'   => $description,
                        'subcat'        => $subcat,
                        'idcat'         => $idcat,
                        'hidden'        => $hidden
                    ));
                    header('Location: listCategories.php');
                } else {
                    $errors['descAdd'] = "Champs requis !";
                }
            } else {
                $errors['titleAdd'] = "Champs requis !";
            }
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>UrHosting - Ajouter une catégorie</title>

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
            <h1 class="h3 mb-0 text-gray-800">Ajouter une catégorie</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
          <!-- Content Row -->
          <div class="row">

          <!-- Page Heading -->
            <?php
                if(isset($_GET['choice']))
                {
                    $choice = intval($_GET['choice']);
            ?>
                <form method="POST" class="category">
                    <table>
                        <tr>
                            <th>
                                <div class="form-group <?php if(isset($errors['titleAdd'])) { echo 'has-danger'; } ?>">
                                <label class="col-sm-2 col-form-label" for="titleLabel">Titre</label>
                                    <input type="text" class="form-control form-control-category <?php if(isset($errors['nameAdd'])) { echo 'is-invalid'; } ?>" id="titleLabel" name="titleAdd" placeholder="Titre de la catégorie" style="width: 300px;">
                                    <div class="invalid-feedback"><?= $errors['titleAdd']; ?></div>
                                </div>
                            </th>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <label for="descLabel">Description</label>
                                    <textarea class="form-control form-control-category <?php if(isset($errors['descAdd'])) { echo 'is-invalid'; } ?>" id="descLabel" rows="10" name="descAdd" style="width: 600px;"></textarea>
                                    <div class="invalid-feedback"><?= $errors['descAdd']; ?></div>
                                </div>
                            </th>
                        </tr>
                    </table>
                    <?php
                        if($choice == 2){
                    ?>
                    <table>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <label for="catSelectLabel">Catégorie-Parente</label>
                                    <select class="form-control" id="catSelectLabel" name="catSelectAdd">
                                        <?php
                                            $catSearch = $db->query('SELECT * FROM site_knowledgebase_categories WHERE subcat = 0');
                                            while($categoy = $catSearch->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                            <option value="<?= $categoy['id']; ?>"><?= $categoy['title']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </th>
                        </tr>
                    </table>
                    <?php
                        }
                        if($choice == 3){
                    ?>        
                    <table>
                        <tr>
                            <th>
                                <div class="form-group">
                                    <label for="catSelectLabel">Catégorie-Parente</label>
                                    <select class="form-control" id="catSelectLabel" name="catSelectAdd">
                                        <?php
                                            $catSearch = $db->query('SELECT * FROM site_knowledgebase_categories WHERE subcat > 0');
                                            while($categoy = $catSearch->fetch(PDO::FETCH_ASSOC)){
                                        ?>
                                            <option value="<?= $categoy['id']; ?>"><?= $categoy['title']; ?></option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </th>
                        </tr>
                    </table>
                    <?php
                        }
                    ?>
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
                    <input type="submit" class="btn btn-success btn-user btn-block" name="formCategoryAdd" value="Ajouter la catégorie"/>
                </form>
                <div class="d-flex justify-content-center"><a href="addCategory.php"><input type="submit" class="btn btn-secondary btn-user btn-block" value="Retour"/></a></div>
            <?php
                } else {
            ?>
                <a href="?choice=1" style="text-decoration: none;">
                    <div class="card border-left-success mb-3" style="max-width: 23rem;">
                        <div class="card-body">
                            <h4 class="card-title">Catégorie</h4>
                            <p class="card-text">Afin de créer une catégorie principale sur le site et y associer des sous-catégories.</p>
                        </div>
                    </div>
                </a>
                <a href="?choice=2" style="text-decoration: none;">
                    <div class="card border-left-info ml-3" style="max-width: 23rem;">
                        <div class="card-body">
                            <h4 class="card-title">Sous-Catégorie</h4>
                            <p class="card-text">Afin de créer une sous-catégorie unique liée directement à une catégorie.</p>
                        </div>
                    </div>
                </a>
                <a href="?choice=3" style="text-decoration: none;" ?>
                    <div class="card border-left-danger ml-3" style="max-width: 23rem;">
                        <div class="card-body">
                            <h4 class="card-title">Particulière</h4>
                            <p class="card-text">Afin de créer une sous-catégorie d'une sous-catégorie et ainsi de suite</p>
                        </div>
                    </div>
                </a>
            <?php
                }
            ?>

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
    header($redirect.'Location: login.php');
  }
?>
