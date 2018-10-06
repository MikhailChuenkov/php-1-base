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
function getProductsFromBasket(){
    getConnection();
    $sql = "SELECT * FROM basket";
    return queryAll($sql);
}
function getProductsFromBasketById($id){
    getConnection();
    $sql = "SELECT * FROM basket WHERE productId = '{$id}'";
    return queryOne($sql);
}
/*
function render($template, $parameters = []){
    extract($parameters);
    include TEMPLATES_DIR . "{$template}.php";
}*/