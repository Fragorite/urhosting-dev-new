<!doctype html>
<html lang="zxx">

<head>
    <?php include('includes/headerMeta.php'); ?>
    <title><?= $nomDuSite; ?> - Accueil</title>
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
    <div id="container">
        <div id="mb-4">
            <h1>Conditions Générales de Ventes</h1>
            <p>Le contrat portant sur l’utilisation des offres et services de UrHosting entre en vigueur et produit
                s’est effet dans l’immédiat lorsque le client envoi le formulaire en ligne. En cas de données
                erronées dans la commande ou dans ses informations personnelles (telles qu’une erreur dans l’adresse,
                l’identité ou les moyens de communications), le client est le seul responsable de tout dommage, pénalité ou amende connexe. En outre, UrHosting se réserve le droit de refuser une commande passée sans devoir motiver sa décision.</p>
        </div>
    </div>


    <!-- ====== footer starts ====== -->
</div>
<?php include('includes/footer.php'); ?>

</body>

</html>