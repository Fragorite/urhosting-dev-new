<?php
    /*
     * LA LISTE DES ERREURS ET AUTRES
     *
     * ___________________ GLOBALES ___________________
     * 1 = Vous n'avez pas accès à cette page.
     * ________________________________________________
     *
     * _______________ LES PARTENARIATS _______________
     * 2 = Résiliation contrat de partenariat réussie
     * 3 = Résiliation contrat de partenariat échouée
     * 4 = Activation contrat de partenariat réussi
     * 5 = Activation contrat de partenariat échouée
     * 6 = Acceptation contrat de partenariat réussi
     * 7 = Acceptation contrat de partenariat échouée
     * 8 = Refus contrat de partenariat réussi
     * 9 = Refus contrat de partenariat échoué
     * _________________________________________________
     */

    function evenement($evenement){
        switch ($evenement){
            case 1:
                $content = "Vous n'avez pas l'autorisation d'accéder à cette page";
                $type = 0;
                continue;
            case 2:
                $content = "Le contrat de partenariat a été résilié avec succès. Vous pouvez à tout moment l'activer.";
                $type = 1;
                continue;
            case 3:
                $content = "Le contrat de partenariat n'a pas pu être résilié (ERROR <b>#0003</b>).";
                $type = 0;
                continue;
            case 4:
                $content = "Le contrat de partenariat a été activé avec succès. Vous pouvez à tout moment le désactiver.";
                $type = 1;
                continue;
            case 5:
                $content = "Le contrat de partenariat n'a pas pu être activé (ERROR <b>#0005</b>).";
                $type = 0;
                continue;
            case 6:
                $content = "La demande de partenariat a été accepté avec succès. Vous pouvez activer le contrat à tout moment.";
                $type = 1;
                continue;
            case 7:
                $content = "La demande de partenariat n'a pas pu être acceptée (ERROR <b>#0007</b>)";
                $type = 0;
                continue;
            case 8:
                $content = "La demande de partenariat a été réfusée avec succès. Vous pouvez toujours la retrouver dans les demandes refusées.";
                $type = 1;
                continue;
            case 9:
                $content = "La demande de partenariat n'a pas pu être refusée (ERROR <b>#0009</b>)";
                $type = 0;
                continue;
            default:
                $content = "<b>ERROR</b> #9999";
                $type = 0;
                continue;

        }
        if($type == 1){
            $status = "success";
        } else {
            $status = "danger";
        }

        return sprintf("<div class='alert alert-dismissible alert-%s'><button type='button' class='close' data-dismiss='alert'>&times;</button>%s</div>", $status, $content);

    }

