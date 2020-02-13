<?php include('administration/includes/config.php'); ?>
<?php
    $pageName = basename(__FILE__);
    $groupSearch = $db->query('SELECT * FROM site_products_groups WHERE pageName = "'.$pageName.'"');
    $group = $groupSearch->fetch(PDO::FETCH_ASSOC);
    $productSearch = $db->query('SELECT * FROM site_products WHERE groupId = "'.$group['id'].'" ORDER BY id ASC');
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
            <?php include ('includes/header.php'); ?>
        </header>
        <!-- ====== header ends ====== -->
        <!-- ====== top-banner starts ====== -->
        <div class="top-banner" style="background-image:url(img/banner/host-banner.jpg)">
            <div class="banner-overlay">
                <h2><?= $group['title']; ?></h2>
                <div class="banner-links">
                    <ul>
                        <li>
                            <?= $group['description']; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ====== top-banner ends ====== -->
        <!-- ====== host-process starts ====== -->
        <section class="host-process section-padding pt-110">
            <div class="container clearfix center-grid">
                <div class="process-item">
                    <div class="process-img">
                        <img src="img/icons/proc-1.png" alt="icon">
                    </div>
                    <h4> CHOISISSEZ VOTRE OFFRE</h4>
                </div>
                <div class="process-item">
                    <div class="process-img">
                        <img src="img/icons/proc-2.png" alt="icon">
                    </div>
                    <h4> CREEZ VOTRE COMPTE </h4>
                </div>
                <div class="process-item">
                    <div class="process-img">
                        <img src="img/icons/proc-3.png" alt="icon">
                    </div>
                    <h4> LANCER VOTRE SERVEUR </h4>
                </div>
            </div>
        </section>
        <!-- ====== host-process ends ====== -->
        <!-- ====== plan starts ====== -->
        <section class="plans section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="all-title">
                            <h3>LISTE DE NOS OFFRES</h3>
                            <div class="title-border">
                                <span></span>
                            </div>
                            <p>
                                Toutes nos offres sont concues pour et par la communauté. Nous essayons de garder le meilleur rapport qualité - prix graçe à notre infrastucture auto-gérée
                                Française.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                        while($product = $productSearch->fetch(PDO::FETCH_ASSOC)) {
                            $productPricingSearch = $db->query('SELECT * FROM tblpricing WHERE id = (SELECT MAX(id) FROM tblpricing WHERE relid = "'.$product['productIdWhmcs'].'" AND type = "product")');
                            $productPricing = $productPricingSearch->fetch(PDO::FETCH_ASSOC);
                            ?>
                            <div class="col-lg-3 col-md-6">
                                <div class="plan-wrap">
                                    <div class="plan-heading">
                                        <h4>
                                            <?php
                                                if($productPricing['monthly'] == "-1.00") {
                                                    ?>
                                                    <font color="red">FREE !</font>
                                                    <?php
                                                } else {
                                                    ?>
                                                    <?= $productPricing['monthly'] ?> €
                                                    <span> / mois</span>
                                                    <?php
                                                }
                                            ?>
                                        </h4>
                                    </div>
                                    <div class="plan-body">
                                        <div class="plan-body-img">
                                            <img src="administration/products/images/<?= $group['img']; ?>" style="border-radius: 50%;" alt="icons">
                                        </div>
                                        <h5><?= $product['title']; ?></h5>
                                    </div>
                                    <div class="plan-features">
                                        <ul>
                                            <?php
                                                if($group['addProcess'] == 1)
                                                {
                                                    ?>
                                                    <li class="right">
                                                        <i class="fas fa-microchip" style="color: black"></i> Intel® Xeon E5 <b style="color:red"><?= $product['addProcess'];
                                                        ?></b> vCore
                                                    </li>
                                                    <?php
                                                }
                                                if($group['addRam'] == 1)
                                                {
                                                    ?>
                                                    <li class="right">
                                                        <i class="fas fa-memory" style="color: black"></i> Mémoire RAM <b style="color:red"><?= $product['addRam']; ?></b> Go
                                                    </li>
                                                <?php
                                                    }
                                                    if($group['addStockage'] == 1){
                                                ?>
                                                    <li class="right">
                                                        <i class="fas fa-hdd" style="color: black"></i> Stockage <b style="color:red"><?= $product['addStockage']; ?></b> Go NVMe
                                                    </li>
                                            <?php
                                                }
                                                if($group['addSlots'] == 1){
                                            ?>
                                                <li class="right">
                                                    <i class="fas fa-user"></i> <b style="color:red"><?= $product['addSlots']; ?> </b> Slots
                                                </li>
                                            <?php
                                                }
                                                if($group['addDatabase'] == 1){
                                            ?>
                                                <li class="right">
                                                    <i class="fa fa-database" style="color: black"></i> <b style="color:red"><?= $product['addDatabase']; ?></b> base(s) de données
                                                </li>
                                            <?php
                                                }
                                                if($group['addBandwith'] == 1){
                                            ?>
                                                <li class="right">
                                                    <i class="fas fa-wifi" style="color: black"></i> <b style="color:red"><?= $product['addBandwith']; ?></b> Mbps
                                                </li>
                                            <?php
                                                }
                                                $selectConfigAddon = $db->query('SELECT * FROM site_products_addons WHERE groupId = "'.$group['id'].'"');
                                                while($addon = $selectConfigAddon->fetch(PDO::FETCH_ASSOC)) {
                                                    ?>
                                                        <li class="right">
                                                            <i class="<?= $addon['icon']; ?>" style="color: black;"></i> <?= $addon['content']; ?>
                                                        </li>
                                                    <?php
                                                }
                                            ?>

                                        </ul>
                                    </div>
                                    <div class="plan-footer">
                                        <a href="http://urhosting.fr/clients/cart.php?a=add&pid=<?= $product['productIdWhmcs']; ?>" class="btn host-btn">
                                            Commander
                                            <i class="fa fa-long-arrow-right i-round"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                </div>
            </div>
        </section>
        <!-- ====== plan ends ====== -->
        <?php include('includes/footer.php'); ?>

</body>

</html>