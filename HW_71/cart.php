<?php

class Cart {
    public function __construct() {
        session_start();
        
        if(empty($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addItem($item, $quantity) {
        if(!empty($_SESSION['cart'][$item])) {
            $quantity += $_SESSION['cart'][$item];
        }
        $_SESSION['cart'][$item] = $quantity;
    }

    public function clearCart(){
        return $_SESSION['cart'] =[];
    }

    public function getItems() {
        return $_SESSION['cart'];
    }

    public function removeItem($item){
        unset($_SESSION['cart'][$item]);
    }

    public function changeQuantity($item, $newQuantity){
        return $_SESSION['cart'][$item] = $newQuantity;
    }
}
$cart = new Cart();

if(!empty($_POST['item']) && !empty($_POST['quantity']) && is_numeric($_POST['quantity']) && $_POST['quantity'] >= 1){
    $cart->addItem($_POST['item'], number_format($_POST['quantity'], 0));
}

if(!empty($_POST['removeItem'])){
    $cart->removeItem($_POST['removeItem']);
}

if(!empty($_POST['clearCart'])){
    $cart->clearCart();
}

if(!empty($_POST['changeQuantity']) && !empty($_POST['key'])){
    $cart->changeQuantity($_POST['key'], $_POST['changeQuantity']);
}

include "inventory.php";

$totalPrice = 0;
foreach($_SESSION['cart'] as $key=>$value){
    $totalPrice += $items[$key] * $value;
}

include 'cartView.php';
?>