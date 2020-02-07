<?php include('administration/includes/config.php'); ?>

<?php
    if(isset($_POST['formConnect'])){
        if(!empty($_POST['mailUser']) && !empty($_POST['passwordUser'])){
            $searchMail = $db->query('SELECT * FROM site_partners WHERE userMail = "'.$_POST['userMail'].'"');
            $mailExist = $searchMail->rowCount();
            if($mailExist == 1){
                $passwordUser = md5($_POST['passwordUser']);
                $partner = $searchMail->fetch(PDO::FETCH_ASSOC);
                if($partner['password'] == $passwordUser){
                    $_SESSION['id'] = $partner['id'];
                    header('Location: partner-show.php');
                } else {
                    $error = "Identifiants de connexion incorrects.";
                }
            }
        }
    }

?>

<!doctype html>
<html lang="zxx">

<head>
    <title>Hostby</title>
    <!-- Required meta tags -->
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
                <h2>ESPACE PARTENAIRE</h2>
                <div class="banner-links">
                    <ul>
                        <li>
                            Connexion à l'espace partenaire
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ====== top-banner ends ====== -->
        <!-- ====== sign-in starts ====== -->
        <section class="sign-in pt-110 pb-140">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="sign-in-wrap">
                            <h3>Connexion</h3>
                            <p>
                                Pas partenaire ?
                                <a href="partner-new.php"> Déposez un dossier. </a>
                            </p>
                            <form>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span>
                                            <i class="fa fa-user"></i> Adresse MAIL
                                        </span>
                                        <input type="text" class="form-control" name="mailUser">
                                    </div>
                                    <div class="col-md-12">
                                        <span>
                                            <i class="fa fa-lock"></i> Mot de passe
                                        </span>
                                        <input type="password" class="form-control" name="passwordUser">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="checkbox" name="mychk" id="mychk" value="op1">
                                        <label for="mychk">
                                            Se souvenir
                                        </label>
                                        <a href="#" class="float-right">Mot de passe oublié</a>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit" name="formConnect">Connexion</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== sign-in ends ====== -->
        <?php include('includes/footer.php'); ?>
    </div>


</body>

</html>