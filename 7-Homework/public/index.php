<?php
include __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . "autoload.php";

session_start();
$userId = $_SESSION['user_id'];
$res1 = mathOperation($_GET['num1'],$_GET['num2'], $_GET['operation']);
$res2 = mathOperation($_POST['num1'],$_POST['num2'], $_POST['operation']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['commentbtn'] && $_POST['comment'] != ''){
        $comment = $_POST['comment'];
        $idComment = $_POST['id'];
        sendComment($comment);
        redirect($_SERVER["HTTP_REFERER"]);
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
            redirect($_SERVER["HTTP_REFERER"]);
        }
    }
    if($_POST['delProduct']){
        $delProductId = $_POST['delProduct'];
        $delProduct = delProduct($delProductId);
        redirect($_SERVER["HTTP_REFERER"]);
    }
    if ($_POST['addProduct']) {
        var_dump($_POST);
        addProduct($_POST['title'], $_POST['price'], $_FILES["photo"]["name"]);
        if (!file_exists(UPLOADS_DIR)) {
            mkdir(UPLOADS_DIR);
        }
        if (/*$_FILES["file"]["size"] <= 500000 &&
            $_FILES["file"]["type"] == "image/jpeg"*/
        true) {
            $files = scandir(UPLOADS_DIR);
            $files = excess($files);
/*
            if (count($files) != 0) {
                for ($i = 0; $i < count($files); $i++) {
                    $filenameServer = stristr($files[$i], ".", true);
                    $filenameLoad = stristr($_FILES["file"]["name"], ".", true);
                    if ($filenameLoad == $filenameServer) {
                        $filenameLoad .= substr(uniqid('', true), -3);
                        $filename = UPLOADS_DIR . $filenameLoad . stristr($_FILES["file"]["name"], ".");
                        move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
                    } else {
                        $filename = UPLOADS_DIR . $_FILES["file"]["name"];
                        move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
                    }
                }
            } else {
                $filename = UPLOADS_DIR . $_FILES["file"]["name"];
                var_dump($filename);
                move_uploaded_file($_FILES["file"]["tmp_name"], $filename);
            }
*/
            $filename = UPLOADS_DIR . $_FILES["photo"]["name"];
            var_dump($_FILES);
            move_uploaded_file($_FILES["photo"]["tmp_name"], $filename);
        }
    }
}

$getSummBasketByProduct = getSummBasketByProduct();
$getSummBasket = getSummBasket($getSummBasketByProduct);
$getComments = getComments();
$getGoods = getGoods();
$getProductsFromBasket = getProductsFromBasket();
$getUserById = getUserById($userId);
$parameters = [
    'getGoods' => $getGoods,
    'getComments' => $getComments,
    'getProductsFromBasket' => $getProductsFromBasket,
    'getSummBasket' => $getSummBasket,
    'getUserById' => $getUserById,
];

render('products', $parameters);


