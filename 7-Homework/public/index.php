<?php
include __DIR__ . '/../config/main.php';
include ENGINE_DIR . 'calculation.php';
include ENGINE_DIR . 'comment.php';
include ENGINE_DIR . "base.php";
include ENGINE_DIR . "goods.php";
include ENGINE_DIR . 'db.php';
include ENGINE_DIR . 'users.php';
include ENGINE_DIR . 'basket.php';

$res1 = mathOperation($_GET['num1'],$_GET['num2'], $_GET['operation']);
$res2 = mathOperation($_POST['num1'],$_POST['num2'], $_POST['operation']);
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['commentbtn'] && $_POST['comment'] != ''){
        $comment = $_POST['comment'];
        $idComment = $_POST['id'];
        sendComment($comment);
        redirect("/index.php");
    }
    if($_POST['userbtn']){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $getUsers = getUsers($login, $password);
        $_SESSION['user_id'] = $getUsers['id'];
        if($getUsers){
            redirect("/myoffice.php");
        } else {
            redirect("/myofficeerror.php");
        }
    }
    if($_POST['userbtnReg']){
        $loginReg = $_POST['loginReg'];
        $passwordReg = $_POST['passwordReg'];
        $sendUsers = sendUser($loginReg, $passwordReg);
        $getUsers = getUsers($loginReg, $passwordReg);
        $_SESSION['user_id'] = $getUsers['id'];
        if($getUsers){
            redirect("/myoffice.php");
        } else {
            redirect("/myofficeerror.php");
        }
    }
    if($_POST['buybtn']){
        $buyProductId = $_POST['buybtn'];
        $getProduct = getProduct($buyProductId);
        if (getProductsFromBasketById($buyProductId)) {
            updateProductToBasket($buyProductId);
        } else {
            $addProductToBasket = addProductToBasket($getProduct);
            redirect("/index.php");
        }
    }
    if($_POST['delProduct']){
        $delProductId = $_POST['delProduct'];
        $delProduct = delProduct($delProductId);
        redirect("/index.php");
    }
}
$getSummBasketByProduct = getSummBasketByProduct();
$getSummBasket = getSummBasket($getSummBasketByProduct);
$getComments = getComments();
$getGoods = getGoods();
$getProductsFromBasket = getProductsFromBasket();
$parameters = [
    'getGoods' => $getGoods,
    'getComments' => $getComments,
    'getProductsFromBasket' => $getProductsFromBasket,
    'getSummBasket' => $getSummBasket,
];
render('products', $parameters);


