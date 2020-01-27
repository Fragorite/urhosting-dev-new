<?php include('../includes/config.php');
if(isset($userinfo['id'])){
    $redirect = "../";

    if(isset($_POST['formAddStaff'])){




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

        <title>UrHosting - Ajouter un membre à l'équipe</title>

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
        <?php include('../includes/menu.php'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <?php include('../includes/navbartop.php'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Ajouter un membre à l'équipe</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <form method="POST" class="partner">
                            <table>
                                <tr>
                                    <th>
                                        Déclarant(e) :
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <label for="sexeSelect">Sexe</label>
                                            <select class="form-control" id="sexeSelect" name="sexeAdd">
                                                <option value="0">Homme</option>
                                                <option value="1">Femme</option>
                                            </select>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label" for="lastNameLabel">Nom</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['nameAdd'])) { echo 'is-invalid'; } ?>" id="lastNameLabel" name="lastNameAdd" placeholder="Nom">
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group ml-5">
                                            <label class="col-sm-2 col-form-label" for="nameLabel">Prénom</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['lastNameAdd'])) { echo 'is-invalid'; } ?>" id="nameLabel" name="nameAdd" placeholder="Nom">
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group" style="width: 500px">
                                            <label class="col-sm-2 col-form-label" for="adressLabel">Adresse</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['adressAdd'])) { echo 'is-invalid'; } ?>" id="adressLabel" name="adressAdd" placeholder="Adresse (n° rue et voie)">
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group" style="width: 300px">
                                            <label class="col-sm-2 col-form-label" for="zipCodeLabel">ZipCode</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['zipCodeAdd'])) { echo 'is-invalid'; } ?>" id="zipCodeLabel" name="zipCodeAdd" placeholder="00000">
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label" for="countryLabel">Pays</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['countryAdd'])) { echo 'is-invalid'; } ?>" id="countryLabel" name="countryAdd" placeholder="France / Belgique ...">
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>
                                        <label class="col-sm-2 col-form-label" for="phoneLabel">Téléphone</label>
                                        <input type="text" class="form-control form-control-partner <?php if(isset($errors['phoneAdd'])) { echo 'is-invalid'; } ?>" id="phoneLabel" name="phoneAdd" placeholder="061234578">
                                    </th>
                                    <th style="width: 400px">
                                        <label class="col-sm-2 col-form-label" for="mailLabel">Email</label>
                                        <input type="text" class="form-control form-control-partner<?php if(isset($errors['mailAdd'])) { echo 'is-invalid'; } ?>" id="mailLabel" name="mailAdd" placeholder="jean-marc@outlook.fr">
                                    </th>
                                </tr>
                            </table>
                            <br />
                            <input type="submit" class="btn btn-success btn-user btn-block" name="formPartnerAdd" value="Ajouter le partenaire"/>
                        </form>
                        <div class="d-flex justify-content-center"><a href="../index.php"><button class="btn btn-secondary btn-user btn-block">Retour</button></a></div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include('../includes/footer.php'); ?>
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
    header('Location: ../login.php');
}
?>
