<?php 
    if(!isset($_SESSION)) {
        session_start();
    }

// Configuration locale
/*$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "urhosting";*/

// Configuration externe
$db_host = "localhost";
$db_username = "root";
$db_password = "8eJ4y5XaUY79rC8u";
$db_name = "urhosting";

try {
    $db = new PDO('mysql:host=localhost;dbname=urhosting', $db_username, $db_password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

if(isset($_SESSION['id'])) {
    $query = $db->query('SELECT * FROM site_users WHERE id = "'.$_SESSION['id'].'"');
    $userinfo = $query->fetch(PDO::FETCH_ASSOC);
}

?>