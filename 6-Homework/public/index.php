<?php
include __DIR__ . '/../config/main.php';
include ENGINE_DIR . 'calculation.php';
include ENGINE_DIR . 'comment.php';
include ENGINE_DIR . "base.php";
include ENGINE_DIR . "goods.php";


$res1 = mathOperation($_GET['num1'],$_GET['num2'], $_GET['operation']);
$res2 = mathOperation($_POST['num1'],$_POST['num2'], $_POST['operation']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if($_POST['comment']){
        $comment = $_POST['comment'];
        $idComment = $_POST['id'];
        sendComment($comment, $config);
        redirect("/index.php");
    }
}

$getComments = getComments();
$getGoods = getGoods();
include TEMPLATES_DIR . 'calcform.php';


