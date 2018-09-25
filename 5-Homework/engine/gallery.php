<?php
function getGallery(){
    return array_filter(
        scandir(PUBLIC_DIR . "img"),
        function($item){
            return !is_dir(PUBLIC_DIR . "img/" . $item);
        }
    );
}
function getGallerySQL(){
    $conn = mysqli_connect("localhost", "root", "", "litle_shop");

    $sql = "SELECT * FROM litle_shop.photo_small ";

    if(!$res = mysqli_query($conn, $sql)){
        var_dump(mysqli_error($conn));
    }
    return $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
}
