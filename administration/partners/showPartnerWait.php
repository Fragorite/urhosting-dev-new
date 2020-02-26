<?php include('../includes/config.php');
$redirect = "../";
if(isset($userinfo['id'])){
    if(isset($_GET['id'])){
        $getId = intval($_GET['id']);
        $search = $db->query('SELECT * FROM site_partners_wait WHERE id = '.$getId);
        if($search->rowCount() == 1){
            $partner = $search->fetch(PDO::FETCH_ASSOC);
            $searchLastContractNumber = $db->query('SELECT * FROM site_partners ORDER BY id DESC LIMIT 1');
            $lastContract = $searchLastContractNumber->fetch(PDO::FETCH_ASSOC);
            $lastContractNumber = $lastContract['contractNumber'] + 1;
            if(isset($_GET['update'])){
                $update = intval($_GET['update']);
                if($update == "10000"){
                    $status = $partner['projectStatus'];
                    // On accepte le contrat de partenariat

                    // Préparation des données
                    $contractNumber         = $lastContractNumber;
                    $contractYear           = $partner['contractYear'];
                    $contractVersion        = 01;
                    $reporterName           = $partner['userName'];
                    $reporterLastName       = $partner['userLastName'];
                    $reporterSexe           = $partner['userSexe'];
                    $reporterAdress         = $partner['userAdress'];
                    $reporterZipCode        = $partner['userZipCode'];
                    $reporterCountry        = $partner['userCountry'];
                    $reporterPhone          = $partner['userPhone'];
                    $reporterMail           = $partner['userMail'];
                    $startDate              = $partner['startDate'];
                    $endDate                = $partner['endDate'];
                    $password               = $partner['password'];

                    if($status == 1 || $status == 2){
                        $projectNumber = $partner['projectNumber'];
                        $projectName   = $partner['projectName'];
                    } else {
                        $projectNumber = 0;
                        $projectName = $partner['projectName'];
                    }

                    if($status != 3){
                        $projectAdress  = $partner['projectAdress'];
                        $projectZipCode = $partner['projectZipCode'];
                        $projectCity    = $partner['projectCity'];
                        $projectCountry = $partner['projectCountry'];
                        $projectPhone   = $partner['projectPhone'];
                        $projectMail    = $partner['projectMail'];
                    } else {
                        $projectAdress  = 0;
                        $projectZipCode = 0;
                        $projectCountry = 0;
                        $projectPhone   = 0;
                        $projectMail    = 0;
                    }
                    $communityManager = $userinfo['id'];

                    // _____________________________________
                    $query_insert = $db->prepare('INSERT INTO site_partners(contractNumber, contractYear, contractVersion, userName, userLastName, userSexe, userAdress, userZipCode, userCountry, userPhone, userMail, projectNumber, projectStatus, projectName, projectAdress, projectZipCode, projectCity, projectCountry, projectPhone, projectMail, startDate, endDate, partnerContract, partnerConditions, password, CM) VALUES (:contractNumber, :contractYear, :contractVersion, :reporterName, :reporterLastName, :reporterSexe, :reporterAdress, :reporterZipCode, :reporterCountry, :reporterPhone, :reporterMail, :projectNumber, :projectStatus, :projectName, :projectAdress, :projectZipCode, :projectCity, :projectCountry, :projectPhone, :projectMail, :startDate, :endDate, :partnerContract, :partnerConditions, :password, :CM)');
                    $query_insert->execute(array(
                        'contractNumber'    => $contractNumber,
                        'contractYear'      => $contractYear,
                        'contractVersion'   => $contractVersion,
                        'reporterName'      => $reporterName,
                        'reporterLastName'  => $reporterLastName,
                        'reporterSexe'      => $reporterSexe,
                        'reporterAdress'    => $reporterAdress,
                        'reporterZipCode'   => $reporterZipCode,
                        'reporterCountry'   => $reporterCountry,
                        'reporterPhone'     => $reporterPhone,
                        'reporterMail'      => $reporterMail,
                        'projectNumber'     => $projectNumber,
                        'projectStatus'     => $status,
                        'projectName'       => $projectName,
                        'projectAdress'     => $projectAdress,
                        'projectZipCode'    => $projectZipCode,
                        'projectCity'       => $projectCity,
                        'projectCountry'    => $projectCountry,
                        'projectPhone'      => $projectPhone,
                        'projectMail'       => $projectMail,
                        'startDate'         => $startDate,
                        'endDate'           => $endDate,
                        'partnerContract'   => $file_contract,
                        'partnerConditions' => $file_conditions,
                        'password'          => $password,
                        'active'            => '1',
                        'CM'                => $communityManager
                    ));
                    header('Location: listPartner.php?acceptContractSuccess');
                } else {
                    $updateStatus = $db->query('UPDATE site_partners_wait SET status = "'.$update.'", CM = "'
                        .$userinfo['username'].'" WHERE id = "'
                        .$getId.'"');
                    $http = 'Location: showPartnerWait.php?id='.$getId.'&updateStatus='.$update;
                    header($http);
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

                <title>UrHosting - Dossier partenaire</title>

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
                                <h1 class="h3 mb-0 text-gray-800">Dossier <?= $partner['projectName']; ?> -
                                    <?php if
                                    ($partner['status'] == 0) { echo "<font color='orange'><b>EN ATTENTE</b></font>";
                                    } elseif($partner['status'] == 1) { echo "<font color=red><b>REFUSÉ</b></font>"; }
                                    ?></h1>
                            </div>
                            <!-- Content Row -->
                            <div class="row">
                                <!-- Page Heading -->
                                <div class="card shadow m-3">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardInformationsFolder" class="d-block card-header py-3"
                                       data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Informations de dossier :</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardInformationsFolder">
                                        <div class="card-body">
                                            <u>Date de la demande : </u> <font color="blue"><b><?= $partner['createdAt'];
                                                    ?></b></font><br />
                                            <u>Début du dernier contrat :</u> <font color="green"><b><?= $partner['startDate']; ?></b></font><br />
                                            <u>Fin du contrat :</u> <font color="red"><b><?= $partner['endDate']; ?></b></font><br />
                                            <u>Community Manager :</u> <i><?php if($partner['CM'] != 0) { echo
                                                $partner['CM']; } else { echo "<i>Aucun ...</i>"; }
                                            ?></i><br />
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
                                <div class="card shadow m-3 col-10">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardInformationsPartner" class="d-block card-header py-3"
                                       data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Présentation partenaire</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardInformationsPartner">
                                        <div class="card-body">
                                            <?= $partner['projectDescription']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow m-3 col-10">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardDescriptionProject" class="d-block card-header py-3"
                                       data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Plus de détails ...</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardDescriptionProject">
                                        <div class="card-body">
                                            <?= $partner['description']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow mb-3" style="max-width: 500px;">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardActions" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Actions</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardActions">
                                        <div class="card-body">
                                            <?php
                                                if($partner['status'] >= 0 && $partner['status'] != 1) {
                                                    ?>
                                                    <a href="?id=<?= $partner['id'] ?>&update=10000"
                                                       class="btn btn-success btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                        <span class="text">Accepter le contrat</span>
                                                    </a><br/>
                                                    <div class="my-2"></div>
                                                    <a href="?id=<?= $partner['id'] ?>&update=1" class="btn btn-danger
                                                btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                        <span class="text">Refuser le contrat</span>
                                                    </a><br/>
                                                    <div class="my-2"></div>
                                                    <?php
                                                }
                                            ?>
                                            <a href="#" class="btn btn-primary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Demande d'informations supplémentaires</span>
                                            </a><br/>
                                            <div class="my-2"></div>
                                            <a href="listPartnersWait.php" class="btn btn-secondary btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-door-open"></i>
                                                </span>
                                                <span class="text">Retour</span>
                                            </a>
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
                                <div class="card shadow m-3" style="max-width: 500px;">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardInformationsFile" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">Documents du dossier</h6>
                                    </a>
                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardInformationsFiles">
                                        <div class="card-body">
                                            <?php
                                            $foo_identity = 'folder/waiting/'.$partner['docIdentity'];
                                            if(file_exists($foo_identity)){
                                                ?>
                                                <a href="<?= $foo_identity; ?>" target="_blank" class="btn btn-secondary
                                                btn-icon-split">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-arrow-right"></i>
                                                    </span>
                                                    <span class="text">Pièce d'identité</span>
                                                </a>
                                                <?php
                                            } else {
                                            ?>
                                                <i>Aucun document disponible ...</i>
                                                <a href="#" class="btn btn-primary btn-icon-split btn-lg">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-flag"></i>
                                                    </span>
                                                    <span class="text">Importer de nouveaux documents</span>
                                                </a>
                                                <?php
                                            }
                                            ?>
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
