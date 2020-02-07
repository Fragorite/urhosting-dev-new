<?php include('administration/includes/config.php'); ?>

<?php
    $searchGroups = $db->query('SELECT * FROM site_products_groups WHERE hidden = 0');
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
        <div class="top-banner" style="background-image:url(img/banner/services-banner.jpg)">
            <div class="banner-overlay">
                <h2>PRODUITS / SERVICES</h2>
                <div class="banner-links">
                    <ul>
                        <li>
                            Tous nos produits vous attendent !
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- ====== top-banner ends ====== -->
        <!-- ====== portfolio starts ====== -->
        <section class="portfolio portfolio-columns pt-110 pb-140 bg-white">
            <div class="container">
                <div class="portfolio-sort">
                    <ul class="sorting clearfix center-grid">
                        <li class="sort-btn active" data-filter="*">Tout</li>
                        <li class="sort-btn" data-filter=".servers-gaming">Serveurs Gaming</li>
                        <li class="sort-btn" data-filter=".servers-vps">Serveurs VPS</li>
                        <li class="sort-btn" data-filter=".web">Solutions WEB</li>
                        <li class="sort-btn" data-filter=".others">Autres</li>
                    </ul>
                </div>
                <div class="row portfolio-gallary">
                    <?php
                        while($group = $searchGroups->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-lg-3 col-md-6 port-item <?php if($group['typeServersGaming'] == 1) { echo "servers-gaming"; } if($group['typeServersVPS'] == 1) { echo "servers-vps";
                            } if($group['typeWeb'] == 1) { echo "web"; } if($group['typeOthers'] == 1) { echo "others"; } ?>">
                                <div class="portfolio-inner">
                                    <img src="administration/products/images/<?= $group['img']; ?>" width="250px" height="270px">
                                    <div class="dimmer">
                                        <h4>
                                            <a href="portfolio-detail.html"> <?= $group['title']; ?></a>
                                        </h4>
                                        <div class="portfolio-overlay">
                                            <a href="<?php echo $group['pageName']; ?>" class="link">
                                                A partir de ...
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    ?>
                </div>

                 <!-- <div class="host-pagination clearfix">
                    <div class="row">
                        <div class="col-sm-3">
                            <a href="#" class="page-prev">
                                <i class="fa fa-long-arrow-left"></i> prev
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <ul>
                                <li class="pagination-item active">
                                    <a href="#">1</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="#">2</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="#">3</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="#">4</a>
                                </li>
                                <li class="pagination-item">
                                    <a href="#">5</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-3">
                            <a href="#" class="page-next">
                                next
                                <i class="fa fa-long-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>
        <!-- ====== portfolio ends ====== -->
        <?php
            include ('includes/footer.php');
        ?>

</body>

</html>