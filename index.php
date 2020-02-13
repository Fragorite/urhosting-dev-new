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

        <!-- ====== top-section starts ====== -->
        <section class="top-section">
            <div class="host-blue-warp">
                <div class="host-slider1 owl-carousel owl-theme">
                    <div class="item">
                        <img src="img/home/host-slide4.jpg" alt="host">
                        <div class="slide-overlay">
                            <div class="slide-table">
                                <div class="slide-table-cell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="slide-text">
                                                    <h2>
                                                        <span>UrHosting</span> Serveurs
                                                    </h2>
                                                    <p class="host-amt">
                                                        A partir de
                                                        <span> 1.50€</span> / mois
                                                    </p>
                                                    <p class="slide-para">
                                                        Découvrez une large gamme de serveurs de jeux en vente, avec une puissance assurée et un prix défiant toute concurrence !
                                                    </p>
                                                    <div class="host-pakage">
                                                        <a class="btn host-btn" href="#">Voir les offres</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="host-rocket d-lg-block d-none">
                                                    <img src="img/icons/slider-rocket.png" alt="rocket">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="img/home/host-slide3.jpg" alt="host">
                        <div class="slide-overlay">
                            <div class="slide-table">
                                <div class="slide-table-cell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="slide-text">
                                                    <h2>
                                                        Partenaire
                                                        <span>UrHosting</span>
                                                    </h2>
                                                    <p class="slide-para">
                                                        Devenez dès maintenant partenaire de UrHosting ! Nous vous proposons des offres personnalisées à vos besoins.
                                                    </p>
                                                    <div class="host-pakage">
                                                        <a class="btn host-btn" href="#">Demande de partenariat</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-5">
                                                <div class="host-rocket d-lg-block d-none">
                                                    <img src="img/icons/slider-rocket.png" alt="rocket">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <img src="img/home/host-slide2.jpg" alt="host">
                        <div class="slide-overlay">
                            <div class="slide-table">
                                <div class="slide-table-cell">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="slide-text">
                                                    <h2>
                                                        <span>UrHosting</span> Solutions Web
                                                    </h2>
                                                    <p class="host-amt">
                                                        A partir de
                                                        <span> 0.99€</span> / mois
                                                    </p>
                                                    <p class="slide-para">
                                                        Une infrastructure protégée, avec des scripts pré-installés pour vous permettre une mise en place de votre site rapide et à moindres coûts !
                                                    </p>
                                                    <div class="host-pakage">
                                                        <a class="btn host-btn" href="#">Voir les offres</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 d-lg-block d-none">
                                                <div class="host-rocket">
                                                    <img src="img/icons/slider-rocket.png" alt="rocket">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ====== header ends ====== -->
        <!-- ======search-domain starts ====== -->
        <section class="search-domain section-padding top-line">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 pb-md-0 pb-4 text-md-left text-center">
                        <h4>Vérifiez votre domaine</h4>
                        <p>Vérifiez si votre nom de domaine est disponible!</p>
                    </div>
                    <div class="col-md-7">
                        <form action="#" class="domain-search-box form-inline">
                            <input type="text" placeholder="Entrez votre domaine ici ..." class="form-control form-text-search">
                            <div class="select-wrapper">
                                <select class="custom-select" id="inlineFormCustomSelect">
                                    <option selected>.com</option>
                                    <option value="1">.net</option>
                                    <option value="2">.org</option>
                                </select>
                            </div>
                            <button type="submit" class="btn host-btn">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                        <div class="searchs">
                            <a href="#" class="domain-links">Prix des noms de domaines</a>
                            <a href="#" class="domain-links">Transférer un domaine</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======search-domain endss ====== -->
        <!-- ====== service starts ====== -->
        <section class="service-2 section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="all-title">
                            <h3>services</h3>
                            <div class="title-border">
                                <span></span>
                            </div>
                            <p>
                                Découvrez nos offres, riches en puissances et pauvres en prix. Des offres rien que pour vous !
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="service-slider owl-carousel owl-theme">
                        <div class="item">
                            <div class="service-item">
                                <h4>
                                    Hébergement
                                    <br> web
                                </h4>
                                <img src="img/icons/service2-1.png" alt="icon" class="tab-img">
                                <p>
                                    Des offres variantes selon vos besoins. Nous évoluons selon vos besoins pour vous proposer l'offre qui vous correspond le mieux.
                                </p>
                                <a href="#" class="btn host-btn">
                                    Voir plus
                                    <i class="fa fa-long-arrow-right i-round"></i>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="service-item">
                                <h4>
                                    Serveurs
                                    <br> Gaming
                                </h4>
                                <img src="img/icons/service2-2.png" alt="icon" class="tab-img">
                                <p>
                                    Nous vous proposons des offres Minecraft, Minecraft PE, CS:GO, ARK, ARMA3, FIVEM .. Et bien d'autres encore, à tout petit prix !
                                </p>
                                <a href="#" class="btn host-btn">
                                    Voir plus
                                    <i class="fa fa-long-arrow-right i-round"></i>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="service-item">
                                <h4>
                                    Serveurs
                                    <br> VPS
                                </h4>
                                <img src="img/icons/service2-3.png" alt="icon" class="tab-img">
                                <p>
                                    Une multitude de serveurs VPS adaptable à vos besoins, sans frais caché, sans limite dans la durée et dans une infrastructure Française.
                                </p>
                                <a href="#" class="btn host-btn">
                                    Voir Plus
                                    <i class="fa fa-long-arrow-right i-round"></i>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="service-item">
                                <h4>
                                    Revendeur
                                    <br> Ptérodactyl
                                </h4>
                                <img src="img/icons/service2-4.png" alt="icon" class="tab-img">
                                <p>
                                    Vous voulez devenir votre propre patron ? Hébergez une multitude de serveurs de jeux pour vous ou vos clients graçe à nos revendeurs pré-installés.
                                </p>
                                <a href="#" class="btn host-btn">
                                    Voir plus
                                    <i class="fa fa-long-arrow-right i-round"></i>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                                <div class="service-item">
                                    <h4>
                                        Offres
                                        <br> Sur-mesure
                                    </h4>
                                    <img src="img/icons/service2-2.png" alt="icon" class="tab-img">
                                    <p>
                                        Une envie d'innover ? N'hésitez pas à contacter notre service commercial afin de demander l'établissement d'une offre sur-mesure !
                                    </p>
                                    <a href="#" class="btn host-btn">
                                        Contactez-nous
                                        <i class="fa fa-long-arrow-right i-round"></i>
                                    </a>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== service ends ====== -->

        <!-- ====== featues starts ====== -->
        <section class="feature-2 section-padding top-line-b">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="all-title">
                            <h3>Caractéristiques</h3>
                            <div class="title-border">
                                <span></span>
                            </div>
                            <p>
                                Un hébergeur de qualité qui s'adapte selon vos besoins, vos moyens ainsi que votre situation. Une interaction client / hébergeur défiant toute concurrence. Nous rapprochez de vous, une nécessité.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel-wrap">
                            <div class="feature-image">
                                <img src="img/icons/features-2-icon.png" alt="icon">
                            </div>
                            <div class="feature-list-group" id="myList" role="tablist">
                                <ul>
                                    <li class="f-holder current first">
                                        <a class="features-tab" href="#disk">
                                            Performances accrues
                                            <span class="f-item-icon">
                                                <img src="img/icons/fea-1.png" alt="icon">
                                            </span>
                                            <span class="dot"></span>
                                        </a>
                                    </li>
                                    <li class="f-holder second">
                                        <a class="features-tab" href="#update">
                                            99.9% Update Time
                                            <span class="f-item-icon">
                                                <img src="img/icons/fea-2.png" alt="icon">
                                            </span>
                                            <span class="dot"></span>
                                        </a>
                                    </li>
                                    <li class="f-holder third">
                                        <a class="features-tab" href="#secure">
                                            Scan de sécurité avancé
                                            <span class="f-item-icon">
                                                <img src="img/icons/fea-4.png" alt="icon">
                                            </span>
                                            <span class="dot"></span>
                                        </a>
                                    </li>
                                    <li class="f-holder fourth">
                                        <a class="features-tab" href="#support">
                                            Support 24x7
                                            <span class="f-item-icon">
                                                <img src="img/icons/fea-3.png" alt="icon">
                                            </span>
                                            <span class="dot"></span>
                                        </a>
                                    </li>
                                    <li class="f-holder fifth">
                                        <a class="features-tab" href="#control">
                                            Panel simple et intuitif
                                            <span class="f-item-icon">
                                                <img src="img/icons/fea-5.png" alt="icon">
                                            </span>
                                            <span class="dot"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="feature-content-holder">
                            <div class="feature-box" id="disk">
                                <h3>Performances accrues</h3>
                                <p>
                                    UrHosting vous propose des services avec de la mémoire vide, du stockage ainsi que de la bande passante.
                                    Tous nos services respectent l'intégralité de la description qui lui est indiqué.
                                    Graçe à une infrastructure auto-géré, nous pouvons à tout moment ajouter ou enlever de la RAM, du stockage, des CPU ou encore de la bande passante pour ajuster nos offres à votre besoin en temps réel.
                                </p>
                            </div>
                            <div class="feature-box" id="update">
                                <h3>99.9% Update Time</h3>
                                <p>
                                    UrHosting vous garanti un Uptime à 99.9% sur toutes les machines dont l'association dispose. L'infrastructure auto-gérée permet une maintenance complète et rapide à tous moment, pour éviter que de petits soucis ne deviennent votre problème.
                                </p>
                            </div>
                            <div class="feature-box" id="secure">
                                <h3>Scan de sécurité avancé</h3>
                                <p>
                                    UrHosting vous propose un anti-virus ainsi qu'un anti-ddos lié à l'infrastructure. Toute menace est directement bloquée avant même de pouvoir pénétrer dans notre réseau.
                                    Un scan minutieux est lancé toutes les nuits afin d'éviter les intrusions en cas de virus déjà en propagation.
                                    Graçe à nous, vous gardez vos données en sécurité, et vous vous sentez bien protégé.
                                </p>
                            </div>
                            <div class="feature-box" id="support">
                                <h3>Support 24x7</h3>
                                <p>
                                    UrHosting vous propose un support de qualité, prêt à répondre à toutes vos demandes.
                                    Notre équipe est disposé à régler tous les problèmes liés à notre infrastructure, mais aussi directement à votre service.
                                    Graçe à un échange de connaissances entre chaque membre de l'équipe, chacun dispose des informations nécessaires afin de répondre à tout type de question.
                                </p>
                            </div>
                            <div class="feature-box" id="control">
                                <h3>Panel simple et intuitif</h3>
                                <p>
                                    UrHosting vous propose de découvrir le panel Ptérodactyl pour les serveurs de jeux.
                                    Ce panel, en constante évolution, est pourvu de plusieurs modules complémentaires fourni à titre onéreux ou gracieux au client.
                                    Celui-ci étant en constante évolution, des nouveautés y arrivent très fréquemment, pour permettre une immersion complète et un simplicité d'utilisation.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ====== features ends ====== -->
        <!-- ====== footer starts ====== -->
    </div>
    <?php include('includes/footer.php'); ?>

</body>

</html>