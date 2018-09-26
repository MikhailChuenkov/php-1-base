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

    $sql = "SELECT * FROM litle_shop.photo ";

    if(!$res = mysqli_query($conn, $sql)){
        var_dump(mysqli_error($conn));
    }
    return $data = mysqli_fetch_all($res, MYSQLI_ASSOC);
}

function getSortGalleryForScorer () {
    $conn = mysqli_connect("localhost", "root", "", "litle_shop");

    $sql = "SELECT scorer FROM litle_shop.photo";
    if(!$res = mysqli_query($conn, $sql)){
        var_dump(mysqli_error($conn));
    }

    $arrScorerAll = mysqli_fetch_all($res, MYSQLI_NUM);
    $arrScorer = [];
    foreach ($arrScorerAll as $value) {
            $arrScorer[] = $value[0];
    }
    array_multisort($arrScorer);
    return $arrScorer;
}