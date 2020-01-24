<?php include('./administration/includes/config.php');
    if(isset($userinfo['id'])){
        $selectAllAlerts = $db->prepare('SELECT * FROM site_alerts_administration WHERE user_id = :user_id AND hidden = 0');
        $selectAllAlerts->execute(array(
            'user_id' => $userinfo['id']
        ));
        while($alert = $selectAllAlerts->fetch(PDO::FETCH_ASSOC)){
            $updateAlert = $db->prepare('UPDATE site_alerts_administration SET hidden = 1 WHERE id = :id');
            $updateAlert->execute(array(
                'id' => $alert['id']
            ));
        }
    }