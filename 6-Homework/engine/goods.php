<?php
function getGoods(){
    getConnection();
    $sql = "SELECT * FROM goodsData";
    return queryAll($sql);
}
function getProduct($id){
    getConnection();
    $sql = "SELECT * FROM goodsData WHERE id = '{$id}'";
    return queryOne($sql);
}

function render($template, $parameters = []){
    extract($parameters);
    include TEMPLATES_DIR . "{$template}.php";
}