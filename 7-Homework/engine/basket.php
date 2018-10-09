<?php
function addProductToBasket($getProduct)
{
    $sql = "INSERT INTO basket (productId, productName, productCount, productSumm) VALUE ('{$getProduct['id']}', 
    '{$getProduct['title']}', 1, '{$getProduct['price']}')";
    return execute($sql);
}

function delProduct($delProductId)
{
    $sql = "DELETE FROM basket WHERE productId = '{$delProductId}'";
    return execute($sql);
}

function updateProductToBasket($buyProductId)
{
    $sql = "UPDATE basket SET productCount = productCount + 1, productSumm = productSumm * productCount WHERE productId = '{$buyProductId}'";
    return execute($sql);
}

function getSummBasketByProduct()
{
    $sql = "SELECT productSumm FROM basket";
    return queryAll($sql);
}

function getSummBasket($getSummBasketByProduct)
{
    for ($i = 0, $res = 0; $i < count($getSummBasketByProduct); $i++) {
        $res += $getSummBasketByProduct[$i]['productSumm'];
    }
    return $res;
}

function addOrder($userId)
{
    $sql = "INSERT INTO orders (idUser) VALUE ('{$userId}')";
    return execute($sql);
}

function getLastOrderId(){
    $sql = "SELECT MAX(id) AS id FROM orders";
    return queryOne($sql);
}

function getBasket(){
    $sql = "SELECT * FROM basket";
    return queryAll($sql);
}
function addOrderProducts($getBasket, $getOrderId, $getSummBasket)
{
    for ($i = 0; $i < count($getBasket); $i++) {
        $productId = $getBasket[$i]['productId'];
        $productName = $getBasket[$i]['productName'];
        $countProduct = $getBasket[$i]['productCount'];
        $productSumm = $getBasket[$i]['productSumm'];
        $sql = "INSERT INTO orderProducts (orderId, productId, countProduct, productName, productSumm, orderSumm) 
    VALUE ('{$getOrderId['id']}', '{$productId}', '{$countProduct}', '{$productName}', '{$productSumm}', 
    '{$getSummBasket}')";
        execute($sql);
    }
}

function clearBasket($getBasket){
    for ($i = 0; $i < count($getBasket); $i++) {
        $sql = "DELETE FROM basket WHERE id = '{$getBasket[$i]['id']}'";
        execute($sql);
    }
}

