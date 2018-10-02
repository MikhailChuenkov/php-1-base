<?php
include __DIR__ . '/../config/main.php';
include ENGINE_DIR . 'calculation.php';
include ENGINE_DIR . 'comment.php';
include ENGINE_DIR . "base.php";
include ENGINE_DIR . "goods.php";
include ENGINE_DIR . 'db.php';
include ENGINE_DIR . 'users.php';

$res1 = mathOperation($_GET['num1'],$_GET['num2'], $_GET['operation']);
$res2 = mathOperation($_POST['num1'],$_POST['num2'], $_POST['operation']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['commentbtn']){
        $comment = $_POST['comment'];
        $idComment = $_POST['id'];
        sendComment($comment);
        redirect("/index.php");
    }
    if($_POST['userbtn']){
        $login = $_POST['login'];
        $password = $_POST['password'];
        $getUsers = getUsers($login, $password);
        //var_dump($getUsers['id']);
        session_start();
        $_SESSION['user_id'] = $getUsers['id'];
        if($getUsers){
            redirect("/myoffice.php");
        } else {
            redirect("/myofficeerror.php");
        }
    }
}

$getComments = getComments();
$getGoods = getGoods();
$parameters = [
    'getGoods' => $getGoods,
    'getComments' => $getComments,
];
render('products', $parameters);


