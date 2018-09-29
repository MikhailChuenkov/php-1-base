<?php
header("Content-type: text/html; charset=utf-8");

include __DIR__ . '/../config/main.php';
include ENGINE_DIR . "gallery.php";

if($id = $_GET['id']){
    incPhotoScorer($id);
    $image = getImage($id);
    include TEMPLATES_DIR . "bigphoto.php";
}
//var_dump($id);
/*
if($id = $_GET['id']){
    $conn = mysqli_connect("localhost", "root", "", "litle_shop");

    $id = (int) mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM litle_shop.photo WHERE id = {$id}";
    if(!$res = mysqli_query($conn, $sql)){
        var_dump(mysqli_error($conn));
    }

    $scorer = "UPDATE litle_shop.photo SET scorer = 1 + scorer WHERE id = {$id}";
    if(!$scorerRes = mysqli_query($conn, $scorer)){
        var_dump(mysqli_error($conn));
    }
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    include TEMPLATES_DIR . "bigphoto.php";
    mysqli_close($conn);
}*/