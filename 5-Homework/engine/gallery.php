<?php
require_once ENGINE_DIR . "db.php";

function getGallerySQL(){
    $sql = "SELECT * FROM photo ORDER BY scorer DESC";
    return queryAll($sql);
}

function addImage($originalName, $fileSize){
    $sql = "INSERT INTO photo (name, title, size) VALUE ('{$originalName}', '{$originalName}', '{$fileSize}')";
    return execute($sql);
}

function getImage($id){
    $sql = "SELECT * FROM photo WHERE id = {$id}";
    return queryOne($sql);
}

function incPhotoScorer($id){
    $sql = "UPDATE photo SET scorer = scorer + 1 WHERE id = {$id}";
    return execute($sql);
}