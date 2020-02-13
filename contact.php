<?php include('administration/includes/config.php'); ?>

<?php
    if(isset($_POST['formSend'])){
        $username = $_POST['username'];
        $usermail = $_POST['usermail'];
        $department = $_POST['department'];
        $content = htmlspecialchars($_POST['content']);
        $insert = $db->prepare('INSERT INTO site_support_contact(username,usermail,department,content,status) VALUES(:username, :usermail, :department, :content, :status)');
        $insert->execute(array(
            'username'      => $username,
            'usermail'      => $usermail,
            'department'    => $department,
            'content'       => $content,
            'status'        => 0
        ));
        header('Location: contact.php?messageSend');
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
        <div class="top-banner" style="background-image:url(img/banner/contact-banner.jpg)">
            <div class="banner-overlay">
                <h2>CONTACTEZ NOUS</h2>
                <div class="banner-links">
                    <ul>
                        <li>
                            Formulaire de contact
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ====== top-banner ends ====== -->
        <!-- ====== contact-us starts ====== -->
        <section class="pt-110 section-padding">
            <div class="container">
                <div class="all-title pb-5">
                    <h3>Support 24/7</h3>
                </div>
                <div class="onl-support">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <div class="support-item">
                                <div class="support-item-icon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                                <a href="#">Bientôt</a>
                                <p>Disponible ..</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="support-item">
                                <div class="support-item-icon">
                                    <i class="fa fa-envelope-square"></i>
                                </div>
                                <a href="#">Mail</a>
                                <p>contact@urhosting.fr</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="support-item">
                                <div class="support-item-icon">
                                    <i class="fa fa-paper-plane"></i>
                                </div>
                                <a href="#">Ticket</a>
                                <p>Connectez vous pour ouvrir un ticket</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <div class="support-item">
                                <div class="support-item-icon">
                                    <i class="fa fa-comments"></i>
                                </div>
                                <a href="#">live chat</a>
                                <p>Communiquez avec nous 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-us">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Formulaire de contact</h3>
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" class="form-control" name="username" placeholder="Votre nom" required>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="email" class="form-control" name="usermail" placeholder="Votre email" required>
                                    </div>
                                    <div class="col-md-12">
                                        <select name="department" class="form-control">
                                            <option disabled>Choisir un service à contacter</option>
                                            <option value="1">Service Technique</option>
                                            <option value="2">Service Commercial</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <textarea name="content" class="form-control" id="message" placeholder="Votre message" rows="4"></textarea>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-submit" name="formSend">Envoyez le message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== contact-us ends ====== -->
        <?php include('includes/footer.php'); ?>


</body>

</html>