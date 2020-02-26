<?php
    function getMaxId(){
        include('administration/includes/config.php');
        $value = $db->query('SELECT * FROM site_users');
        return $value->fetch(PDO::FETCH_ASSOC);
    }
    $users = getMaxId();
    echo $users['id'];
    ?>

