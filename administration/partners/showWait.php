<?php include('../includes/config.php');
$redirect = "../";
if(isset($userinfo['id'])){
    if(isset($_GET['id'])){
        $getId = intval($_GET['id']);
        $search = $db->query('SELECT * FROM site_partners_wait WHERE id = '.$getId);
        if($search->rowCount() == 1){
            $partner = $search->fetch(PDO::FETCH_ASSOC);

            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>

                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <meta name="description" content="">
                <meta name="author" content="">

                <title>UrHosting - Informations partenaire</title>

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
                                <h1 class="h3 mb-0 text-gray-800">Dossier <font color="orange">EN ATTENTE</font></h1>
                            </div>
                            <!-- Content Row -->
                            <?php
                            if(isset($_GET['updateStatus'])){
                                ?>
                                <div class="alert alert-dismissible alert-success">
                                    <button class="close" type="button" data-dismiss="alert">&times;</button>
                                    <?php
                                    if($_GET['updateStatus'] == 0){
                                        ?>
                                        Le contrat a bien été <b>résilié.</b> Vous pouvez l'activiter manuellement à tout moment.
                                        <?php
                                    } else {
                                        ?>
                                        Le contrat a été <b>activé</b> avec succès. Vous pouvez le modifier à tout moment.
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
                                    <a href="#collapseCardInformationsFolder" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Informations de dossier :</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardInformationsFolder">
                                        <div class="card-body">
                                            <u>Début du dernier contrat :</u> <font color="green"><b><?= $partner['startDate']; ?></b></font><br />
                                            <u>Fin du contrat :</u> <font color="red"><b><?= $partner['endDate']; ?></b></font><br />
                                            <u>Status :</u> <font color="orange">En Attente</font>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow m-3">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardInformationsUser" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Identité du déclarant</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardInformationsUser">
                                        <div class="card-body">
                                            <u>Identité :</u> <font color="blue"><b><?php if($partner['userSexe'] == 0) { echo "Monsieur "; } else { echo "Madame "; } echo strtoupper($partner['userLastName']).' '.$partner['userName']; ?></b></font><br />
                                            <u>Adresse :</u> <font color="blue"><b><?php echo $partner['userAdress'].', '.$partner['userZipCode'].' '.strtoupper($partner['userCity']).' - '.strtoupper($partner['userCountry']); ?></b></font><br />
                                            <u>Téléphone :</u> <font color="blue"><b><?= $partner['userPhone']; ?></b></font><br />
                                            <u>Mail :</u> <font color="blue"><b><?= $partner['userMail']; ?></b></font>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow m-3">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardInformationsProject" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Informations sur le partenaire :</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardInformationsProject">
                                        <div class="card-body">
                                            <u>Statut : </u> <font color="orange"><b><?php if($partner['projectStatus'] == 1) { echo "ENTREPRISE"; } elseif($partner['projectStatus' == 2]) { echo "ASSOCIATION"; } else { echo "PARTICULIER"; } ?></b></font><br />
                                            <?php if($partner['projectStatus'] != 3) { ?>
                                                <u><?php if($partner['projectStatus'] == 1) { ?>SIRET :<?php } else { ?>Numéro RNA :<?php } ?></u><b><font color="red"> <?php echo $partner['projectNumber']; ?></font></b><br/>
                                                <u>Nom moral : </u> <font color="blue"><b><?= $partner['projectName']; ?></b></font><br />
                                                <u>Adresse :</u> <font color="blue"><b><?php echo $partner['projectAdress'].', '.$partner['projectZipCode'].' '.strtoupper($partner['projectCity']).' - '.strtoupper($partner['projectCountry']); ?></b></font><br />
                                                <u>Téléphone :</u> <font color="blue"><b><?= $partner['projectPhone']; ?></b></font><br />
                                                <u>Mail :</u> <font color="blue"><b><?= $partner['projectMail']; ?></b></font><br/>
                                            <?php } else { ?>
                                                <u>Nom du projet :</u> <b><font color="blue"><?= $partner['projectName']; ?></font></b><br/>
                                            <?php } ?>
                                            <u>Fonction du déclarant :</u> <b><font color="blue"><?= $partner['userFunction']; ?></font></b>
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
                                        if($partner['active'] == 0){
                                            ?>
                                            <a href="?id=<?= $partner['id'] ?>&status=1" class="btn btn-success btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-check"></i>
                            </span>
                                                <span class="text">Activer manuellement le contrat</span>
                                            </a><br />
                                            <?php
                                        } else {
                                            ?>
                                            <div class="my-2"></div>
                                            <a href="?id=<?= $partner['id'] ?>&status=0" class="btn btn-danger btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-times"></i>
                            </span>
                                                <span class="text">Désactiver manuellement le contrat</span>
                                            </a><br/>
                                            <?php
                                        }
                                        ?>
                                        <div class="my-2"></div>
                                        <a href="#" class="btn btn-primary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-edit"></i>
                            </span>
                                            <span class="text">Modifier les informations</span>
                                        </a><br/>
                                        <div class="my-2"></div>
                                        <a href="listPartners.php" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-door-open"></i>
                            </span>
                                            <span class="text">Retour</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow m-3" style="max-width: 500px;">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardInformationsFile" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Documents fournis par le déclarant</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse show" id="collapseCardInformationsFiles">
                                    <div class="card-body">
                                        <?php
                                        $foo_identity = 'folder/waiting/'.$partner['docIdentity'];
                                        if(file_exists($foo_identity)){
                                            ?>
                                            <a href="<?= $foo_identity; ?>" target="_blank" class="btn btn-secondary btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                                                <span class="text">Document d'identité</span>
                                            </a>
                                            <?php
                                        }
                                        ?>
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

            </body>

            </html>
            <?php
        } else {
            header('Location: listPartners.php');
        }
    } else {
        header('Location: listPartners.php');
    }
} else {
    header('Location: ../login.php');
}
?>
