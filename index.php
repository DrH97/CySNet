<?php

require 'app/start.php';
//
//$HardwareProducts = $db->query("
//	SELECT *
//	FROM products
//")->fetchAll(PDO::FETCH_ASSOC);
//
//$Categories = $db->query("
//  SELECT *
//  FROM categories
//")->fetchAll(PDO::FETCH_ASSOC);
//
//$Repairers = $db->query("
//	SELECT *
//	FROM products
//")->fetchAll(PDO::FETCH_ASSOC);

//require VIEW_ROOT . 'layouts/navbar.php';
$product['review_score'] = false;

if (isset($_GET['seller'])){

    $sellerid = $_GET['sellerid'];

    $sellersdeets = $db->query("SELECT * FROM users JOIN sellers ON users.id = sellers.sellerid WHERE users.id = $sellerid");
//$reviews = $db->query('SELECT * FROM sellers WHERE sellerid = 3');

    if ($sellersdeets){
        $rev = mysqli_fetch_assoc($sellersdeets);
        //var_dump($rev['rating']);
        $product['review_score'] = round($rev['rating'], 1);
        echo $product['review_score'];
    } else {
        $product['review_score'] = false;
    }
} else {
    require VIEW_ROOT . '/shop.php';
}