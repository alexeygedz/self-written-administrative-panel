<?php

class Basket {

    private static $basket;

    private function __construct() {
        $this->clean();
    }

    public static function getInstance() {
        if (null === static::$basket) {
            static::$basket = new static();
        }

        return static::$basket;
    }

    public static function addProduct($id, $quantity) {
        $_SESSION['cart']['products'][$id] = $quantity;
    }

    public function getProductsList() {
        return $_SESSION['cart']['products'];
    }

    public function setProductQuantity($id, $quantity) {
        $_SESSION['cart']['products'][$id] = $quantity;
    }

    public function clean() {
        $_SESSION['cart'] = ['products'=> []];
    }
}