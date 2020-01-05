<?php

// Configuration locale
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "urhosting";

// Configuration externe
/*$db_host = "";
$db_username = "";
$db_password = "";
$db_password = "";*/

try {
    $db = new PDO('mysql:host="'.$db_host.'";dbname="'.$db_name.'"', $db_username, $db_password);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>