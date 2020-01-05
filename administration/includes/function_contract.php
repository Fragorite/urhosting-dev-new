<?php include('config.php');
    function contractCancel($id){
        $cancel = $db->prepare('UPDATE site_partners SET active = 0 WHERE id = :id');
        $cancel->execute(array('id' => $id));
    }


?>