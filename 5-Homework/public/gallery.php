<?php
header("Content-type: text/html; charset=utf-8");

include  __DIR__ . '/../config/main.php';
include ENGINE_DIR . "render.php";
include ENGINE_DIR . "gallery.php";
include ENGINE_DIR . "files.php";
include ENGINE_DIR . "base.php";
include VENDOR_DIR . "funcImgResize.php";


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $filename = PUBLIC_DIR . "img/" . $_FILES['image']['name'];
    uploadFile($filename , 'image');
    img_resize($filename, PUBLIC_DIR . "img/small/" . $_FILES['image']['name'], 200, 150);
    redirect("/index.php");
}

$gallery = getGallerySQL();
$sortGalleryForScorer = getSortGalleryForScorer();
include TEMPLATES_DIR . "gallery.php";

?>