<?php include('administration/includes/config.php'); ?>

<?php

// Constantes
define('TARGET', 'administration/partners/folder/waiting/');
define('MAX_SIZE', 1000000);
define('WIDTH_MAX', 800);
define('HEIGHT_MAX', 800);

// Tableaux de données
$tabExt = array('jpg','png','pdf','jpeg');
$infosImg = array();

// Variables
$extension = '';
$nomImage = '';

if(!is_dir(TARGET)){
    if(!mkdir(TARGET, 0755)){
        exit('Erreur lors de l\'upoad. Erreur 553. Merci de contacter le WebMaster avec cet identifiant.');
    }
}

if (isset($_POST['formSend'])) {
    if (!empty($_POST['prenameUser']) && !empty($_POST['nameUser']) && !empty($_POST['functionUser']) && !empty($_POST['emailUser']) && !empty($_POST['phoneUser']) && !empty($_POST['sexeUser']) && !empty($_POST['addressUser']) && !empty($_POST['zipCodeUser']) && !empty($_POST['cityUser']) && !empty($_POST['countryUser'])) {
        if(!empty($_POST['namePartner']) && !empty($_POST['numberPartner']) && !empty($_POST['descriptionPartner'])){
            if(!empty($_POST['projectPartner']) && !empty($_POST['passwordUser']) && !empty($_POST['repeatPasswordUser'])){
                if(isset($_POST['termscon'])){
                    if($_POST['passwordUser'] == $_POST['repeatPasswordUser']){
                        $userName = htmlspecialchars($_POST['prenameUser']);
                        $userLastName = htmlspecialchars($_POST['nameUser']);
                        $userFunction = htmlspecialchars($_POST['functionUser']);
                        $searchMailWaiting = $db->query('SELECT * FROM site_partners_wait WHERE userMail = "'.$_POST['emailUser'].'"');
                        $searchMailPartner = $db->query('SELECT * FROM site_partners WHERE userMail = "'.$_POST['emailUser'].'"');
                        $mailWaitingExist = $searchMailWaiting->rowCount();
                        $mailPartnerExist = $searchMailPartner->rowCount();
                        if($mailPartnerExist == 0 && $mailWaitingExist == 0){
                            $userMail = htmlspecialchars($_POST['emailUser']);
                            $userPhone = htmlspecialchars($_POST['phoneUser']);
                            $userSexe = $_POST['sexeUser'];
                            $userBirthday = $_POST['choiceDayOfBirth'].'/'.$_POST['choiceMonthOfBirth'].'/'.$_POST['choiceYearOfBirth'];
                            $userAdress = htmlspecialchars($_POST['addressUser']);
                            $userZipCode = htmlspecialchars($_POST['zipCodeUser']);
                            $userCity = htmlspecialchars($_POST['cityUser']);
                            $userCountry = htmlspecialchars($_POST['countryUser']);
                            $projectName = htmlspecialchars($_POST['namePartner']);
                            $statusSend = intval($_GET['id']);
                            $password = md5($_POST['passwordUser']);
                            if($statusSend != 1) {
                                $projectAdress = htmlspecialchars($_POST['addressProject']);
                                $projectZipCode = htmlspecialchars($_POST['zipCodeProject']);
                                $projectCity = htmlspecialchars($_POST['cityProject']);
                                $projectCountry = htmlspecialchars($_POST['countryProject']);
                                $projectMail = htmlspecialchars($_POST['mailProject']);
                                $projectPhone = htmlspecialchars($_POST['projectPhone']);
                            } else {
                                $projectAdress = 0;
                                $projectZipCode = 0;
                                $projectCity = 0;
                                $projectCountry = 0;
                                $projectMail = 0;
                                $projectPhone = 0;
                            }
                            if($statusSend == 2){
                                $projectStatus = 1;
                            }
                            else if($statusSend == 3){
                                $projectStatus = 2;
                            } else {
                                $projectStatus = 1;
                            }
                            $projectNumber = htmlspecialchars($_POST['numberPartner']);
                            $projectDescription = htmlspecialchars($_POST['descriptionPartner']);
                            $startDate = $_POST['choiceDayOfStart'].'/'.$_POST['choiceMonthOfStart'].'/'.$_POST['choiceYearOfStart'];
                            $endDate = $_POST['choiceDayOfEnd'].'/'.$_POST['choiceMonthOfEnd'].'/'.$_POST['choiceYearOfEnd'];
                            $description = htmlspecialchars($_POST['projectPartner']);
                            $createdAt = date('d/m/Y à H:i');
                            // Upload des fichiers
                            if(isset($_FILES['CNIRecto'])){
                                if($_FILES['CNIRecto']['size'] < MAX_SIZE){
                                    $file_ext = explode('.', $_FILES['CNIRecto']['name']);
                                    $file_ext = strtolower(end($file_ext));
                                    if(in_array($file_ext, $tabExt)){
                                        $newName = uniqid(). '.' .$file_ext;
                                        move_uploaded_file($_FILES['CNIRecto']['tmp_name'], 'administration/partners/folder/waiting/'.$newName);
                                        $insert = $db->prepare('INSERT INTO site_partners_wait(userName,userLastName,userBirthday,userSexe,userAdress,userZipCode,userCity,userCountry,userPhone,userMail,userFunction,projectNumber,projectName,projectDescription,projectStatus,projectAdress,projectZipCode,projectCity,projectCountry,projectPhone,projectMail,startDate,endDate,password,description,docIdentity,status) VALUES (:userName, :userLastName,:userBirthday,:userSexe,:userAdress,:userZipCode,:userCity,:userCountry,:userPhone,:userMail,:userFunction,:projectNumber,:projectName,:projectDescription,:projectStatus,:projectAdress,:projectZipCode,:projectCity,:projectCountry,:projectPhone,:projectMail,:startDate,:endDate,:password,:description,:docIdentity,:status)');
                                        $insert->execute(array(
                                           'userName'           => $userName,
                                           'userLastName'       => $userLastName,
                                            'userBirthday'       => $userBirthday,
                                           'userSexe'           => $userSexe,
                                           'userAdress'         => $userAdress,
                                           'userZipCode'        => $userZipCode,
                                           'userCity'           => $userCity,
                                           'userCountry'        => $userCountry,
                                           'userPhone'          => $userPhone,
                                           'userMail'           => $userMail,
                                           'userFunction'       => $userFunction,
                                           'projectNumber'      => $projectNumber,
                                           'projectName'        => $projectName,
                                            'projectDescription'=> $projectDescription,
                                            'projectStatus'     => $projectStatus,
                                            'projectAdress'     => $projectAdress,
                                            'projectZipCode'    => $projectZipCode,
                                            'projectCity'       => $projectCity,
                                            'projectCountry'    => $projectCountry,
                                            'projectPhone'      => $projectPhone,
                                            'projectMail'       => $projectMail,
                                            'startDate'         => $startDate,
                                            'endDate'           => $endDate,
                                            'password'          => $password,
                                            'description'       => $description,
                                            'docIdentity'       => $newName,
                                            'status'            => 0
                                        ));
                                        print("TOUT EST OK");
                                    } else {
                                        $error = "L'extension n'est pas acceptée ! (png, jpg, jpeg, pdf seulement)";
                                    }
                                } else {
                                    $error = "Le fichier est trop volumineux ! (Max 1 Mo)";
                                }

                            }
                        } else {
                            $error = "Cette adresse email est déjà utilisée pour un autre dossier de partenariat.";
                        }
                    } else {
                        $error = "Les mots de passes ne correspondent pas!";
                    }
                } else {
                    $error = "Vous devez accepter les conditions pour continuer.";
                }
            } else {
                $error = "Vous devez remplir tous les champs concernant votre projet avec UrHosting.";
            }
        } else {
            $error = "Vous devez remplir tous les champs concernant votre support / association / entreprise !";
        }
    } else {
        $error = "Vous devez remplir tous les champs requis du formulaire !";

    }
}
?>
<!doctype html>
<html lang="zxx">

<head>
    <?php include('includes/headerMeta.php'); ?>
</head>

<body>
<div class="wrapper">
    <!-- ====== scroll to top ====== -->
    <a id="goTop" title="Go to top" href="javascript:void(0)">
        <img src="img/home/scroll.png" alt="plane">
    </a>

    <!-- ====== preloader ====== -->
    <div id="preloader"></div>

    <!-- ====== header starts ====== -->
    <header>
        <?php include('includes/header.php'); ?>
    </header>
    <!-- ====== header ends ====== -->
    <!-- ====== top-banner starts ====== -->
    <div class="top-banner" style="background-image:url(img/banner/login-banner.jpg)">
        <div class="banner-overlay">
            <h2>PARTENARIAT</h2>
            <div class="banner-links">
                <ul>
                    <li>
                        ENREGISTRER UN NOUVEAU DOSSIER
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- ====== top-banner ends ====== -->
    <?php if (!isset($_GET['id'])) { ?>
        <section class="service-2 what-we-do section-padding pt-110">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="all-title">
                            <h3>PARTENAIRE</h3>
                            <div class="title-border">
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row center-grid">
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="service-item">
                            <h4>
                                Particulier
                            </h4>
                            <img src="img/icons/service2-1.png" alt="icon" class="tab-img">
                            <p>
                                Je souhaite créer un partenariat pour mon serveur de jeux, un concours pour ma chaîne ou autres.
                            </p>
                            <a href="?id=1" class="btn host-btn">
                                Déposer le dossier
                                <i class="fa fa-long-arrow-right i-round"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="service-item">
                            <h4>
                                Entreprise
                            </h4>
                            <img src="img/icons/service2-2.png" alt="icon" class="tab-img">
                            <p>
                                Je suis une entreprise qui souhaite travailler avec UrHosting en concluant un contrat de partenariat.
                            </p>
                            <a href="?id=2" class="btn host-btn">
                                Déposer le dossier
                                <i class="fa fa-long-arrow-right i-round"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="service-item">
                            <h4>
                                Association
                            </h4>
                            <img src="img/icons/service2-3.png" alt="icon" class="tab-img">
                            <p>
                                Je suis une association voulant un partenariat avec UrHosting pour réduire mes dépenses mensuelles.
                            </p>
                            <a href="?id=4" class="btn host-btn">
                                Déposer le dossier
                                <i class="fa fa-long-arrow-right i-round"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="service-item">
                            <h4>
                                Autres
                            </h4>
                            <img src="img/icons/service2-4.png" alt="icon" class="tab-img">
                            <p>
                                Je souhaite organiser quelque chose de très particulier sans être dans l'une de ces catégories.
                            </p>
                            <a href="contact.php" class="btn host-btn">
                                Contactez-nous
                                <i class="fa fa-long-arrow-right i-round"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php } else { ?>
        <!-- ====== sign-up starts ====== -->
        <section class="sign-up pt-110 pb-140">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="sign-up-wrap">
                            <h3>Création d'un dossier</h3>
                            <p>
                                Dossier déjà ouvert ?
                                <a href="partner-login.php">Connectez-vous </a>
                                <?php if(isset($error)) { ?> <div class="error"><?= $error; ?></div> <?php } ?>
                            </p>
                            <form method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>Fonction du déclarant <span style="color: red; ">*</span></span>
                                        <input type="text" class="form-control" required name="functionUser" value="<?php if(isset($_POST['functionUser'])) { echo $_POST['functionUser']; }
                                        ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <span> Nom <span style="color: red; ">*</span></span>
                                        <input type="text" class="form-control" required name="nameUser" value="<?php if(isset($_POST['nameUser'])) { echo $_POST['nameUser']; } ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <span>Prénom <span style="color: red; ">*</span></span>
                                        <input type="text" class="form-control" required name="prenameUser" value="<?php if(isset($_POST['prenameUser'])) { echo $_POST['prenameUser']; } ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <span>Email <span style="color: red; ">*</span></span>
                                        <input type="email" class="form-control" required name="emailUser" value="<?php if(isset($_POST['emailUser'])) { echo $_POST['emailUser']; } ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <span>Téléphone <span style="color: red; ">*</span></span>
                                        <input type="text" class="form-control" required name="phoneUser" value="<?php if(isset($_POST['phoneUser'])) { echo $_POST['phoneUser']; } ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Genre <span style="color: red; ">*</span></span>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <input type="radio" class="form-check-input mt-3 mb-3" name="sexeUser" id="radios1" value="1" checked>
                                                <label for="radios1">Homme</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="radio" class="form-check-input mt-3 mb-3" name="sexeUser" id="Radios2" value="2">
                                                <label for="Radios2">Femme</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <span>Date de Naissance <span style="color: red; ">*</span></span>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control" id="day" name="choiceDayOfBirth">
                                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="month" name="choiceMonthOfBirth">
                                                    <option disabled>Mois</option>
                                                    <option value="1">Janvier</option>
                                                    <option value="2">Février</option>
                                                    <option value="3">Mars</option>
                                                    <option value="4">Avril</option>
                                                    <option value="5">Mai</option>
                                                    <option value="6">Juin</option>
                                                    <option value="7">Juillet</option>
                                                    <option value="8">Août</option>
                                                    <option value="9">Septembre</option>
                                                    <option value="10">Octobre</option>
                                                    <option value="11">Novembre</option>
                                                    <option value="12">Décembre</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="year" name="choiceYearOfBirth">
                                                    <?php for ($i = 2020; $i >= 1940; $i--) { ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <span>Adresse <span style="color: red; ">*</span></span>
                                        <input type="text" class="form-control" required name="addressUser" value="<?php if(isset($_POST['addressUser'])) { echo $_POST['addressUser']; } ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Code Postal <span style="color: red; ">*</span></span>
                                        <input type="text" class="form-control" required name="zipCodeUser" value="<?php if(isset($_POST['zipCodeUser'])) { echo $_POST['zipCodeUser']; } ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Ville <span style="color: red; ">*</span></span>
                                        <input type="text" class="form-control" required name="cityUser" value="<?php if(isset($_POST['cityUser'])) { echo $_POST['cityUser']; } ?>">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Pays <span style="color: red; ">*</span></span>
                                        <input type="text" class="form-control" required name="countryUser" value="<?php if(isset($_POST['countryUser'])) { echo $_POST['countryUser']; } ?>">
                                    </div>
                                    <?php
                                    $idForm = intval($_GET['id']);
                                    if ($idForm == 2 || $idForm == 3) {
                                        ?>
                                        <div class="col-md-6">
                                            <span>Nom de l'<?php if ($idForm == 2) {
                                                    echo "entreprise";
                                                } else {
                                                    echo "association";
                                                } ?> <span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" name="namePartner" value="<?php if(isset($_POST['namePartner'])) { echo $_POST['namePartner']; } ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <span><?php if ($idForm == 2) {
                                                    echo "SIRET";
                                                } else {
                                                    echo "RNA";
                                                } ?> <span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" name="numberPartner"  value="<?php if(isset($_POST['numberPartner'])) { echo $_POST['numberPartner']; } ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <span>Présentation de l'<?php if ($idForm == 2) {
                                                    echo "entreprise";
                                                } else {
                                                    echo "association";
                                                } ?> <span style="color: red; ">*</span></span><br/>
                                            <textarea style="min-width: 720px; min-height: 300px; border-radius: 3%" name="descriptionPartner"><?php if(isset($_POST['descriptionPartner'])) { echo $_POST['descriptionPartner']; } ?></textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <span>Adresse de l'<?php if ($idForm == 2) {
                                                    echo "entreprise";
                                                } else {
                                                    echo "association";
                                                } ?><span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" required name="addressProject" value="<?php if(isset($_POST['addressProject'])) { echo
                                            $_POST['addressProject']; }
                                            ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <span>Code Postal de l'<?php if ($idForm == 2) {
                                                    echo "entreprise";
                                                } else {
                                                    echo "association";
                                                } ?><span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" required name="zipCodeProject" value="<?php if(isset($_POST['zipCodeProject'])) { echo
                                            $_POST['zipCodeProject']; }
                                            ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <span>Ville de l'<?php if ($idForm == 2) {
                                                    echo "entreprise";
                                                } else {
                                                    echo "association";
                                                } ?><span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" required name="cityProject" value="<?php if(isset($_POST['cityProject'])) { echo $_POST['cityProject']; } ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <span>Pays de l'<?php if ($idForm == 2) {
                                                    echo "entreprise";
                                                } else {
                                                    echo "association";
                                                } ?><span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" required name="countryProject" value="<?php if(isset($_POST['countryProject'])) { echo
                                            $_POST['countryProject']; }
                                            ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <span>Email l'<?php if ($idForm == 2) {
                                                    echo "entreprise";
                                                } else {
                                                    echo "association";
                                                } ?><span style="color: red; ">*</span></span>
                                            <input type="email" class="form-control" required name="mailProject" value="<?php if(isset($_POST['mailProject'])) { echo $_POST['mailProject']; }
                                            ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <span>Téléphone l'<?php if ($idForm == 2) {
                                                    echo "entreprise";
                                                } else {
                                                    echo "association";
                                                } ?><span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" required name="projectPhone" value="<?php if(isset($_POST['projectPhone'])) { echo
                                            $_POST['projectPhone']; }
                                            ?>">
                                        </div>
                                    <?php } else { ?>
                                        <div class="col-md-6">
                                            <span>Nom du projet <span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" name="namePartner" value="<?php if(isset($_POST['namePartner'])) { echo $_POST['namePartner']; } ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <span>Support (Jeux, Chaine YT ...) <span style="color: red; ">*</span></span>
                                            <input type="text" class="form-control" name="numberPartner" value="<?php if(isset($_POST['numberPartner'])) { echo $_POST['numberPartner']; } ?>">
                                        </div>
                                        <div class="col-md-12">
                                            <span>Présentation du support<span style="color: red; ">*</span></span><br/>
                                            <textarea style="min-width: 720px; min-height: 300px; border-radius: 3%" name="descriptionPartner"><?php if(isset($_POST['descriptionPartner'])) { echo $_POST['descriptionPartner']; } ?>"</textarea>
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <span>Début du contrat <span style="color: red; ">*</span></span>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control" id="day" name="choiceDayOfStart">
                                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="month" name="choiceMonthOfStart">
                                                    <option disabled>Mois</option>
                                                    <option value="1">Janvier</option>
                                                    <option value="2">Février</option>
                                                    <option value="3">Mars</option>
                                                    <option value="4">Avril</option>
                                                    <option value="5">Mai</option>
                                                    <option value="6">Juin</option>
                                                    <option value="7">Juillet</option>
                                                    <option value="8">Août</option>
                                                    <option value="9">Septembre</option>
                                                    <option value="10">Octobre</option>
                                                    <option value="11">Novembre</option>
                                                    <option value="12">Décembre</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="year" name="choiceYearOfStart">
                                                    <?php for ($i = 2020; $i <= 2022; $i++) { ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span>Fin du contrat <span style="color: red; ">*</span></span>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control" id="day" name="choiceDayOfEnd">
                                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="month" name="choiceMonthOfEnd">
                                                    <option disabled>Mois</option>
                                                    <option value="1">Janvier</option>
                                                    <option value="2">Février</option>
                                                    <option value="3">Mars</option>
                                                    <option value="4">Avril</option>
                                                    <option value="5">Mai</option>
                                                    <option value="6">Juin</option>
                                                    <option value="7">Juillet</option>
                                                    <option value="8">Août</option>
                                                    <option value="9">Septembre</option>
                                                    <option value="10">Octobre</option>
                                                    <option value="11">Novembre</option>
                                                    <option value="12">Décembre</option>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="year" name="choiceYearOfEnd">
                                                    <?php for ($i = 2020; $i <= 2022; $i++) { ?>
                                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span>Présentation du projet <span style="color: red; ">*</span></span><br/>
                                        <textarea required style="min-width: 720px; min-height: 300px; border-radius: 3%" name="projectPartner"
                                                  placeholder="Merci d'inscrire également ce que vous attendez de UrHosting, et ce que vous pouvez apporter à UrHosting. Il est également conseillé de fournir tous les liens pour justifier, tel que votre chaine Youtube, un lien vers votre site web ou autres."></textarea>
                                    </div>
                                    <div class="col-md-6">
                                        <span>Mot de passe <span style="color: red; ">*</span></span>
                                        <input type="password" class="form-control" required name="passwordUser">
                                    </div>

                                    <div class="col-md-6">
                                        <span>Répétez <span style="color: red; ">*</span></span>
                                        <input type="password" class="form-control" required name="repeatPasswordUser">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Preuve d'identité (Carte d'identité, Permis de conduire, Passeport)</label>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="<?= MAX_SIZE; ?>" />
                                        <input name="CNIRecto" type="file" id="fichier_a_uploader" />
                                        <i>Format accepté : '.png', '.jpg', '.jpeg', '.pdf'. MAX 1 Mo</i>
                                    </div>

                                    <div class="col-md-12">
                                        <input type="checkbox" name="termscon" id="termscon" required>
                                        <label for="termscon">
                                            Je certifie l'exactitude des informations données ci-dessus. Je sais que je m'engage à des poursuites à mon encontre dans le cas d'une tentative
                                            de fraude ou d'escroquerie. <span style="color: red; ">*</span><br/>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit" name="formSend">Déposer le dossier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== sign-up ends ====== -->
    <?php } ?>
    <!-- ====== footer starts ====== -->

</div>
<?php include('includes/footer.php'); ?>


<!-- ====== footer ends ====== -->


</body>

</html>