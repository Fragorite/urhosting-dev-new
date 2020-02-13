<?php include('../includes/config.php');
$redirect = "../";
if(isset($userinfo['id'])){
    if(isset($_POST['formAddonAdd'])){
        $group = $_POST['grpSelect'];
        $content = $_POST['content'];
        $icon = $_POST['icon'];
        $insert = $db->prepare('INSERT INTO site_products_addons (groupId,icon,content) VALUES(:groupId, :icon, :content)');
        $insert->execute(array(
            'groupId'   => $group,
            'icon'      => $icon,
            'content'   => $content
        ));
        header('Location: ../index.php?addonCreated');
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

        <title>UrHosting - Ajouter un addon produit</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Ajouter un addon groupé</h1>
                    </div>
                        <!-- Content Row -->
                    <div class="row">
                        <form method="POST" class="tutorial">
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group <?php if (isset($errors['titleAdd'])) {
                                            echo 'has-danger';
                                        } ?>">
                                            <label class="col-sm-2 col-form-label" for="titleLabel">Contenu</label>
                                            <input type="text" class="form-control form-control-tutorial <?php if (isset($errors['content'])) {
                                                echo 'is-invalid';
                                            } ?>" id="titleLabel" name="content" placeholder="Contenu de l'addon" style="width: 300px;">
                                            <div class="invalid-feedback"><?= $errors['content']; ?></div>
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
                                            <label class="col-form-label" for="titleLabel">Icone</label>
                                            <input type="text" class="form-control form-control-tutorial <?php if (isset($errors['icon'])) {
                                                echo 'is-invalid';
                                            } ?>" id="titleLabel"
                                                   name="icon" placeholder="Icone sans les balises <i></i> (voir FontAwesome)" style="width: 300px;">
                                            <div class="invalid-feedback"><?= $errors['icon']; ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <label for="catSelectLabel">Groupe</label>
                                            <select class="form-control" id="grpSelectLabel" name="grpSelect">
                                                <?php
                                                $grpSearch = $db->query('SELECT * FROM site_products_groups');
                                                while($group = $grpSearch->fetch(PDO::FETCH_ASSOC)){
                                                    ?>
                                                    <option value="<?= $group['id']; ?>"><?= $group['title']; ?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </th>
                                </tr>
                            </table>

                            <input type="submit" class="btn btn-success btn-user btn-block" name="formAddonAdd" value="Ajouter l'addon au Groupe"/>
                        </form>
                        <div class="d-flex justify-content-center"><a href="listProducts.php"><input type="submit" class="btn btn-secondary btn-user btn-block" value="Retour"/></a></div>
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