<?php
include  __DIR__ . '/../config/main.php';
include ENGINE_DIR . "gallery.php";
//$id = $_GET['id'];
//var_dump($id);
if($id = $_GET['id']){
    $conn = mysqli_connect("localhost", "root", "", "litle_shop");

    $id = (int) mysqli_real_escape_string($conn, $id);
    $sql = "SELECT * FROM litle_shop.photo WHERE id = {$id}";

    if(!$res = mysqli_query($conn, $sql)){
        var_dump(mysqli_error($conn));
    }
    $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
    include TEMPLATES_DIR . "bigphoto.php";
    mysqli_close($conn);
}