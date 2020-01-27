<?php include('../includes/config.php');
    $redirect = "../";
    if(isset($userinfo['id'])){
      //if($userPerms['viewPartners'] == 1) {
        if(isset($_GET['status'])){
            $errors = array();
            $status = intval($_GET['status']);
            if(isset($_POST['formPartnerAdd'])){
                if(!empty($_POST['numberAdd'])){
                    if(!empty($_POST['versionAdd'])){
                        if(!empty($_POST['yearAdd'])){
                                if(!empty($_POST['nameAdd'])){
                                    if(!empty($_POST['lastNameAdd'])){
                                        if(!empty($_POST['adressAdd'])){
                                            if(!empty($_POST['zipCodeAdd'])){
                                                if(!empty($_POST['countryAdd'])){
                                                    if(!empty($_POST['phoneAdd'])){
                                                        if(!empty($_POST['mailAdd'])){
                                                            if(($status == 1 || $status == 2) && (empty($_POST['companyAdressAdd']))){
                                                                $errors['companyAdressAdd'] == "Champs requis !";
                                                            }
                                                            else if(($status == 1 || $status == 2) && (empty($_POST['companyNameAdd']))){
                                                                $errors['companyNameAdd'] == "Champs requis !";
                                                            }
                                                            else if(($status == 1 || $status == 2) && (empty($_POST['companyZipCodeAdd']))){
                                                                $errors['companyZipCodeAdd'] == "Champs requis !";
                                                            }
                                                            else if(($status == 1 || $status == 2) && (empty($_POST['companyCountryAdd']))){
                                                                $errors['companyCountryAdd'] == "Champs requis !";
                                                            }
                                                            else if(($status == 1 || $status == 2) && (empty($_POST['companyPhoneAdd']))){
                                                                $errors['companyPhoneAdd'] == "Champs requis !";
                                                            }
                                                            else if(($status == 1 || $status == 2) && (empty($_POST['companyMailAdd']))){
                                                                $errors['companyMailAdd'] == "Champs requis !";
                                                            }
                                                            else if($status == 3 && empty($_POST['projectAdd'])){
                                                                $errors['projectAdd'] == "Champs requis !";
                                                            }
                                                            else if($status == 3 && empty($_POST['functionAdd'])){
                                                                $errors['functionAdd']  == "Champs requis !";
                                                            } else {
                                                                //if(isset($_FILES['contractPartnerAddFile']) && !empty($_FILES['conditionsPartnerAddFile'])){
                                                                    if(!file_exists('folder/'.$_POST['yearAdd'].'/'.$_POST['numberAdd'])){
                                                                        mkdir('folder/'.$_POST['yearAdd'].'/'.$_POST['numberAdd'], 0777, true);
                                                                    }
                                                                    $infosfichier_contract = pathinfo($_FILES['contractPartnerAddFile']['name']);
                                                                    $infosfichier_conditions = pathinfo($_FILES['conditionsPartnerAddFile']['name']);
                                                                    $name_contract = $_FILES["contractPartnerAddFile"]["name"];
                                                                    $name_conditions = $_FILES["conditionsPartnerAddFile"]['name'];
                                                                    $extension_contract = explode('.', $name_contract);
                                                                    $ext_contract = $extension_contract[sizeof($extension_contract) - 1];
                                                                    $extension_conditions = explode('.', $name_conditions);
                                                                    $ext_conditions = $extension_conditions[sizeof($extension_conditions) - 1];
                                                                    //$extension_upload_conditions = $infosfichier_conditions['extension'];
                                                                    $extensions_autorisees = 'pdf';
                                                                    $file_contract = '' .$_POST['numberAdd'].'-'.$_POST['versionAdd']. '-contract.' .$ext_contract;
                                                                    $file_conditions = '' .$_POST['numberAdd'].'-'.$_POST['versionAdd']. '-conditions.' .$ext_conditions;
                                                                   
                                                                        move_uploaded_file($_FILES['contractPartnerAddFile']['tmp_name'], 'folder/'.$_POST['yearAdd'].'/'.$_POST['numberAdd'].'/'.$file_contract);
                                                                        echo "erreur file contract";

                                                                        move_uploaded_file($_FILES['conditionsPartnerAddFile']['tmp_name'], 'folder/'.$_POST['yearAdd'].'/'.$_POST['numberAdd'].'/'.$file_conditions);
                                                                        echo "erreur file conditions";

                                                                    // Importation dans le base de données

                                                                    // Préparation des données
                                                                    $contractNumber         = $_POST['numberAdd'];
                                                                    $contractYear           = $_POST['yearAdd'];
                                                                    $contractVersion        = $_POST['versionAdd'];
                                                                    $reporterName           = $_POST['nameAdd'];
                                                                    $reporterLastName       = $_POST['lastNameAdd'];
                                                                    $reporterSexe           = $_POST['sexeAdd'];
                                                                    $reporterAdress         = $_POST['adressAdd'];
                                                                    $reporterZipCode        = $_POST['zipCodeAdd'];
                                                                    $reporterCountry        = $_POST['countryAdd'];
                                                                    $reporterPhone          = $_POST['phoneAdd'];
                                                                    $reporterMail           = $_POST['mailAdd'];
                                                                    $startDate              = $_POST['startDateAdd'];
                                                                    $endDate                = $_POST['endDateAdd'];

                                                                    if($status == 1){
                                                                        $projectNumber = $_POST['SIRETAdd'];
                                                                        $projectName   = $_POST['companyNameAdd'];
                                                                    }
                                                                    else if($status == 2){
                                                                        $projectNumber = $_POST['RNANumberAdd'];
                                                                        $projectName   = $_POST['associationNameAdd'];
                                                                    } else {
                                                                        $projectNumber = 0;
                                                                        $projectName = $_POST['projectAdd'];
                                                                    }

                                                                    if($status != 3){
                                                                        $projectAdress  = $_POST['companyAdressAdd'];
                                                                        $projectZipCode = $_POST['companyZipCodeAdd'];
                                                                        $projectCountry = $_POST['companyCountryAdd'];
                                                                        $projectPhone   = $_POST['companyPhoneAdd'];
                                                                        $projectMail    = $_POST['companyMailAdd'];
                                                                    } else {
                                                                        $projectAdress  = 0;
                                                                        $projectZipCode = 0;
                                                                        $projectCountry = 0;
                                                                        $projectPhone   = 0;
                                                                        $projectMail    = 0;
                                                                    }

                                                                    // _____________________________________
                                                                    $query_insert = $db->prepare('INSERT INTO site_partners(contractNumber, contractYear, contractVersion, userName, userLastName, userSexe, userAdress, userZipCode, userCountry, userPhone, userMail, projectNumber, projectStatus, projectName, projectAdress, projectZipCode, projectCountry, projectPhone, projectMail, startDate, endDate, partnerContract, partnerConditions, password) VALUES (:contractNumber, :contractYear, :contractVersion, :reporterName, :reporterLastName, :reporterSexe, :reporterAdress, :reporterZipCode, :reporterCountry, :reporterPhone, :reporterMail, :projectNumber, :projectStatus, :projectName, :projectAdress, :projectZipCode, :projectCountry, :projectPhone, :projectMail, :startDate, :endDate, :partnerContract, :partnerConditions, :password)');
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
                                                                        'projectCountry'    => $projectCountry,
                                                                        'projectPhone'      => $projectPhone,
                                                                        'projectMail'       => $projectMail,
                                                                        'startDate'         => $startDate,
                                                                        'endDate'           => $endDate,
                                                                        'partnerContract'   => $file_contract,
                                                                        'partnerConditions' => $file_conditions,
                                                                        'password'          => '0'
                                                                    ));
                                                                    header('Location: listPartner.php?createPartnerSuccess');
                                                            }
                                                        } else {
                                                            $errors['mailAdd'] = "Champs requis !";
                                                        }
                                                    } else {
                                                        $errors['phoneAdd'] = "Champs requis !";
                                                    }
                                                } else {
                                                    $errors['countryAdd'] = "Champs requis !";
                                                }
                                            } else {
                                                $errors['zipCodeAdd'] = "Champs requis !";
                                            }
                                        } else {
                                            $errors['adressAdd'] = "Champs requis !";
                                        }
                                    } else {
                                        $errors['lastNameAdd'] = "Champs requis !";
                                    }
                                } else {
                                    $errors['nameAdd'] = "Champs requis !";
                                }
                        } else {
                            $errors['yearAdd'] = "Champs requis !";
                        }
                    } else {
                        $errors['versionAdd'] = "Champs requis !";
                    }
                } else {
                    $errors['numberAdd'] = "Champs requis !";
                }

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

    <title>UrHosting - Ajouter un partenaire</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Ajouter un nouveau partenaire</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                    <!-- Page Heading -->
                        <?php
                            if(isset($_GET['status']))
                            {

                        ?>
                        <form method="POST" class="partner" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group <?php if(isset($errors['numberAdd'])) { echo 'has-danger'; } ?>">
                                        <label class="col-sm-2 col-form-label" for="numberLabel">Dossier</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['numberAdd'])) { echo 'is-invalid'; } ?>" id="numberLabel" name="numberAdd" placeholder="Numéro de dossier">
                                            <div class="invalid-feedback"><?= $errors['numberAdd']; ?></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label" for="versionLabel">Version</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['versionAdd'])) { echo 'is-invalid'; } ?>" id="versionLabel" name="versionAdd" value="01" placeholder="Numéro de version">
                                            <div class="invalid-feedback"><?= $errors['versionAdd']; ?></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label" for="yearLabel">Année</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['yearAdd'])) { echo 'is-invalid'; } ?>" id="yearLabel" name="yearAdd" value="2020" placeholder="Année de création">
                                            <div class="invalid-feedback"><?= $errors['yearAdd']; ?></div>
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <hr>
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
                            <hr>
                            <?php
                                if($status == 1) {
                                    // Entreprise
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        Entreprise :
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th style="width: 350px;">
                                        <label class="col-sm-2 col-form-label" for="SIRETLabel">SIRET</label>
                                        <input type="text" class="form-control form-control-partner" id="SIRETLabel" name="SIRETAdd" placeholder="Entrez le SIRET de l'entreprise">
                                    </th>
                                    <th style="width: 350px;">
                                        <label class="col-sm-2 col-form-label" for="companyNameLabel">Nom</label>
                                        <input type="text" class="form-control form-control-partner" id="companyNameLabel" name="companyNameAdd" placeholder="Entrez le nom d'entreprise">
                                    </th>
                                </tr>
                            </table>
                            <?php
                                }
                                elseif($status == 2) {
                                    // Association
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        Association :
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th style="width: 350px;">
                                        <label class="col-sm-2 col-form-label" for="RNANumberLabel">RNA</label>
                                        <input type="text" class="form-control form-control-partner" id="RNANumberLabel" name="RNANumberAdd" placeholder="Entrez le numéro d'association">
                                    </th>
                                    <th style="width: 350px;">
                                        <label class="col-sm-2 col-form-label" for="associationNameLabel">Nom</label>
                                        <input type="text" class="form-control form-control-partner" id="associationNameLabel" name="associationNameAdd" placeholder="Entrez le numéro d'association">
                                    </th>
                                </tr>
                            </table>

                            <?php
                                }
                                else if($status == 1 || $status == 2){
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        <div class="form-group" style="width: 500px">
                                            <label class="col-sm-2 col-form-label" for="companyAdressLabel">Adresse</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['companyAdressAdd'])) { echo 'is-invalid'; } ?>" id="companyAdressLabel" name="companyAdressAdd" placeholder="Adresse (n° rue et voie)">
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group" style="width: 300px">
                                            <label class="col-sm-2 col-form-label" for="companyZipCodeLabel">ZipCode</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['companyZipCoDEAdd'])) { echo 'is-invalid'; } ?>" id="companyZipCodeLabel" name="companyZipCodeAdd" placeholder="00000">
                                        </div>
                                    </th>
                                    <th>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label" for="companyCountryLabel">Pays</label>
                                            <input type="text" class="form-control form-control-partner <?php if(isset($errors['companyCountryAdd'])) { echo 'is-invalid'; } ?>" id="companyCountryLabel" name="companyCountryAdd" placeholder="France / Belgique ...">
                                        </div>
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>
                                        <label class="col-sm-2 col-form-label" for="companyPhoneLabel">Téléphone</label>
                                        <input type="text" class="form-control form-control-partner <?php if(isset($errors['companyPhoneAdd'])) { echo 'is-invalid'; } ?>" id="companyPhoneLabel" name="companyPhoneAdd" placeholder="061234578">
                                    </th>
                                    <th style="width: 400px">
                                        <label class="col-sm-2 col-form-label" for="companyMailLabel">Email</label>
                                        <input type="text" class="form-control form-control-partner <?php if(isset($errors['companyPhoneAdd'])) { echo 'is-invalid'; } ?>" id="companyMailLabel" name="companyMailAdd" placeholder="jean-marc@outlook.fr">
                                    </th>
                                </tr>
                            </table>
                            <?php
                                } else {
                                    // Particulier
                            ?>
                            <table>
                                <tr>
                                    <th>
                                        Concernant le projet :
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>
                                        <label class="col-sm-2 col-form-label" for="projectLabel">Projet</label>
                                        <input type="text" class="form-control form-control-partner <?php if(isset($errors['projectAdd'])) { echo 'is-invalid'; } ?>" id="projectLabel" name="projectAdd" placeholder="Nom du projet (+jeu ...)">
                                    </th>
                                    <th style="width: 400px">
                                        <label class="col-sm-2 col-form-label" for="functionLabel">Fonction</label>
                                        <input type="text" class="form-control form-control-partner <?php if(isset($errors['functionAdd'])) { echo 'is-invalid'; } ?>" id="functionLabel" name="functionAdd" placeholder="Fonction du déclarant au sein du projet">
                                    </th>
                                </tr>
                            </table>
                            <?php
                                }
                            ?>
                            <hr>
                            <table>
                                <tr>
                                    <th>
                                        Informations complémentaires
                                    </th>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <th>
                                        <label class="col-sm-2 col-form-label" for="startDateLabel">Début</label>
                                        <input type="text" class="form-control form-control-partner" id="startDateLabel" name="startDateAdd" placeholder="Date du début du contrat">
                                    </th>
                                    <th>
                                        <label class="col-sm-2 col-form-label" for="endDateLabel">Fin</label>
                                        <input type="text" class="form-control form-control-partner" id="endDateLabel" name="endDateAdd" placeholder="Date de fin du contrat">
                                    </th>
                                </tr>
                            </table>
                            <br />
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                            <div class="form-group">
                                <label for="contractPartnerFile">Contrat de partenariat</label>
                                <input class="form-control-file <?php if(isset($errors['contractPartnerFile'])) { echo 'is-invalid'; } ?>" id="contractPartnerFile" name="contractPartnerAddFile" aria-describedby="contractPartnerHelp" type="file">
                                <small class="form-text text-muted" id="contractPartnerHelp">N'oubliez pas de signer les documents avant de les envoyer !</small>
                            </div>
                            <input type="hidden" name="MAX_FILE_SIZE" value="100000" />
                            <div class="form-group">
                                <label for="conditionsPartnerFile">Conditions de partenariat</label>
                                <input class="form-control-file <?php if(isset($errors['conditionsPartnerFile'])) { echo 'is-invalid'; } ?>" id="conditionsPartnerFile" name="conditionsPartnerAddFile" aria-describedby="conditionsPartnerHelp" type="file">
                                <small class="form-text text-muted" id="conditionsPartnerHelp">N'oubliez pas de signer les documents avant de les envoyer !</small>
                            </div>
                            <input type="submit" class="btn btn-success btn-user btn-block" name="formPartnerAdd" value="Ajouter le partenaire"/>
                        </form>
                        <div class="d-flex justify-content-center"><a href="addPartner.php"><input type="submit" class="btn btn-secondary btn-user btn-block" name="formPartnerAdd" value="Retour"/></a></div>
                        <?php
                            } else {
                        ?>
                            <a href="?status=1" style="text-decoration: none;">
                                <div class="card border-left-success mb-3" style="max-width: 23rem;">
                                    <div class="card-body">
                                        <h4 class="card-title">Entreprise</h4>
                                        <p class="card-text">Veuillez vous munir du numéro de SIRET ainsi que de l'adresse du siège de l'entreprise avant de continuer.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="?status=2" style="text-decoration: none;">
                                <div class="card border-left-info ml-3" style="max-width: 23rem;">
                                    <div class="card-body">
                                        <h4 class="card-title">Association</h4>
                                        <p class="card-text">Veuillez vous munir du numéro inscrit au RNA ainsi que de l'adresse du siège de l'association avant de continuer.</p>
                                    </div>
                                </div>
                            </a>
                            <a href="?status=3" style="text-decoration: none;" ?>
                                <div class="card border-left-danger ml-3" style="max-width: 23rem;">
                                    <div class="card-body">
                                        <h4 class="card-title">Particulier</h4>
                                        <p class="card-text">Pas de demande particulière.</p>
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
      //} else {
        //  header('Location: 404.php');
      //}
  } else {
    header('Location: ../login.php');
  }
?>
