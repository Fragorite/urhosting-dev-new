<?php
    // LES REQUETES VALIDES
    $deleteAllAlertsSuccess = "Toutes les alertes ont été supprimées.";
    $createPartnerSuccess = "Le partenaire a bien été ajouté.";
    $cancelPartnerContractSuccess = "Le contrat avec le partenaire a été résilié. Vous pouvez à tout moment le retrouver dans l'onglet \"<strong>Contrats terminés</strong>\" ";

    // LES ERREURS
    $accessDenied = "<strong>Erreur !</strong> Vous n'avez pas la permission pour accéder à cette fonction.";

    // LES COINS DES VALIDES
    if(isset($_GET['deleteAllAlertsSuccess'])){
        echoMsg($deleteAllAlertsSuccess, 1);
    }
    else if(isset($_GET['createPartnerSuccess'])){
        echoMsg($createPartnerSuccess, 1);
    }
    else if(isset($_GET['cancelPartnerContractSuccess'])){
        echoMsg($cancelPartnerContractSuccess, 1);
    }

    // LE COIN DES ERREURS
    if(isset($_GET['accessDenied'])){
        echoMsg($accessDenied, 2);
    }

    ?>

<?php
function echoMsg($content, $status){
    ?>

    <?php
    if($status == 1 || $status == 2) {
        ?>
        <div class="alert alert-dismissible alert-<?php if($status == 1) { echo 'success'; } else { echo 'danger'; } ?>">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $content ?>
        </div>
        <?php
    }
}



