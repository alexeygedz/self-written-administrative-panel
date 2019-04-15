<?php
require '../common.php';
require 'basket.php';

if(isset($_POST['id'])) {
    $id = (int) $_POST['id'];
    $quantity = (int) $_POST['quantity'];

    $a = Basket::getInstance();
    $a->addProduct($id, $quantity);
    $a->getProductsList();
    var_dump($a);
}
//header('Location: ' . $_SERVER['HTTP_REFERER']);
//exit;
