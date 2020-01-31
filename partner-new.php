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
                <h2>register</h2>
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
        <?php if(!isset($_GET['id'])){ ?>
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
                                <a href="login.html">Connectez-vous </a>
                            </p>
                            <form action="#" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>Fonction du déclarant</span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <span> Nom</span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <span>Prénom</span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <span>Email</span>
                                        <input type="email" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <span>Téléphone</span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Genre</span>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <input type="radio" class="form-check-input mt-3 mb-3" name="sexeChoice" id="radios1" value="1" checked>
                                                <label for="radios1">Homme</label>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="radio" class="form-check-input mt-3 mb-3" name="sexeChoice" id="Radios2" value="2">
                                                <label for="Radios2">Femme</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <span>Date de Naissance</span>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control" id="day" name="choiceDayOfBirth">
                                                    <?php for($i = 1; $i <= 31; $i++){ ?>
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
                                                    <?php for($i = 2020; $i >= 1940; $i--) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <span>Adresse</span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Code Postal</span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Ville</span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <span>Pays</span>
                                        <input type="text" class="form-control">
                                    </div>
                                    <?php
                                        $idForm = intval($_GET['id']);
                                        if($idForm == 2 || $idForm == 3){
                                    ?>
                                            <div class="col-md-6">
                                                <span>Nom de l'<?php if($idForm == 2) { echo "entreprise"; } else { echo "association"; } ?></span>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <span><?php if($idForm == 2) { echo "SIRET"; } else { echo "RNA"; } ?></span>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="col-md-12">
                                                <span>Présentation de l'<?php if($idForm == 2) { echo "entreprise"; } else { echo "association"; } ?></span><br/>
                                                <textarea style="min-width: 720px; min-height: 300px; border-radius: 3%"></textarea>
                                            </div>
                                    <?php } else { ?>
                                        <div class="col-md-6">
                                            <span>Nom du projet</span>
                                            <input type="text" class="form-control">
                                        </div>
                                        <div class="col-md-6">
                                            <span>Support (Jeux, Chaine YT ...)</span>
                                            <input type="text" class="form-control">
                                        </div>
                                    <?php } ?>
                                    <div class="col-md-12">
                                        <span>Début du contrat</span>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control" id="day" name="choiceDayOfStart">
                                                    <?php for($i = 1; $i <= 31; $i++){ ?>
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
                                                    <?php for($i = 2020; $i <= 2022; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <span>Fin du contrat</span>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <select class="form-control" id="day" name="choiceDayOfEnd">
                                                    <?php for($i = 1; $i <= 31; $i++){ ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="col-md-4">
                                                <select class="form-control" id="month" name="choiceMonthEnd">
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
                                                    <?php for($i = 2020; $i <= 2022; $i++) { ?>
                                                    <option value="<?= $i; ?>"><?= $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                                <span>Présentation du projet</span><br/>
                                                <textarea style="min-width: 720px; min-height: 300px; border-radius: 3%" placeholder="Merci d'inscrire également ce que vous attendez de UrHosting, et ce que vous pouvez apporter à UrHosting. Il est également conseillé de fournir tous les liens pour justifier, tel que votre chaine Youtube, un lien vers votre site web ou autres."></textarea>
                                            </div>

                                    <div class="col-md-12">
                                        <input type="checkbox" name="termscon" id="termscon" value="exactInfo">
                                        <label for="termscon">
                                            Je certifie l'exactitude des informations données ci-dessus. Je sais que je m'engage à des poursuites à mon encontre dans le cas d'une tentative de fraude ou d'escroquerie.<br/>
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit">create account</button>
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