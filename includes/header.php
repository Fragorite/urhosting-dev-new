<?php include('config.php'); 
    $query = $db->query('SELECT * FROM test');

    echo $query;

?>