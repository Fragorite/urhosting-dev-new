<?php
    $deleteAllAlertsSuccess = "Toutes les alertes ont été supprimées.";

    if(isset($_GET['deleteAllAlertsSuccess'])){
        echoMsg($deleteAllAlertsSuccess, 1);
    }
    else if(isset($_GET['createPartnerSuccess'])){
        $contentAlert = $createPartnerSuccess;
        $alertSuccess = true;
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



