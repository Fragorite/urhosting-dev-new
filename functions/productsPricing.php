<?php
    function getMaxProductPricing($groupId){
        include ('administration/includes/config.php');
        $productPricingSearch = $db->query('SELECT * FROM tblpricing WHERE id = (SELECT MAX(id) FROM tblpricing WHERE relid = "'.$groupId.'" AND type = "product")');
        return $productPricingSearch->fetch(PDO::FETCH_ASSOC);
    }