<?php
    include('../includes/config.php');
    
    $input = $_POST['input'];
    $id = $_POST['id'];
    $newValue = $_POST['value'];
    $val = "UPDATE site_partners SET $input = '$newValue' WHERE id = '$id'";
    $update = $db->query($val);