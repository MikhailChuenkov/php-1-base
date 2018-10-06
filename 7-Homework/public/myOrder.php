<?php
include __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . "autoload.php";

session_start();
$userId = $_SESSION['user_id'];

$getSummBasketByProduct = getSummBasketByProduct();
$getSummBasket = getSummBasket($getSummBasketByProduct);
$getProductsFromBasket = getProductsFromBasket();
$getUserById = getUserById($userId);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['checkout']){
        $addOrder = addOrder($userId);
        $getOrderId = getLastOrderId();
        $getBasket = getBasket();
        //var_dump($getBasket);
        addOrderProducts($getBasket, $getOrderId);
        clearBasket($getBasket);

        //redirect($_SERVER["HTTP_REFERER"]);
        redirect("/index.php");
    }
}

$parameters = [
    'getProductsFromBasket' => $getProductsFromBasket,
    'getSummBasket' => $getSummBasket,
    'getUserById' => $getUserById,
    'userId' => $userId,
];
render('myOrder', $parameters);