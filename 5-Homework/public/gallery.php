<?php
header("Content-type: text/html; charset=utf-8");

include __DIR__ . '/../config/main.php';
include ENGINE_DIR . "gallery.php";
include ENGINE_DIR . "files.php";
include ENGINE_DIR . "base.php";
include VENDOR_DIR . "funcImgResize.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $originalName = $_FILES['image']['name'];
    $filename = PUBLIC_DIR . "img/" . $_FILES['image']['name'];
    uploadFile($filename, 'image');
    $fileSize = filesize($filename);
    img_resize($filename, PUBLIC_DIR . "img/small/" . $_FILES['image']['name'], 200, 150);
    addImage($originalName, $fileSize);
    redirect("/gallery.php");
}

$gallery = getGallerySQL();
include TEMPLATES_DIR . "gallery.php";

?>