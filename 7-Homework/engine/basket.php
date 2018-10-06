<?php
function addProductToBasket($getProduct)
{
    getConnection();
    $sql = "INSERT INTO basket (productId, productName, productCount, productSumm) VALUE ('{$getProduct['id']}', 
    '{$getProduct['title']}', 1, '{$getProduct['price']}')";
    return execute($sql);
}

function delProduct($delProductId)
{
    getConnection();
    $sql = "DELETE FROM basket WHERE productId = '{$delProductId}'";
    return execute($sql);
}

function updateProductToBasket($buyProductId)
{
    getConnection();
    $sql = "UPDATE basket SET productCount = productCount + 1, productSumm = productSumm * productCount WHERE productId = '{$buyProductId}'";
    return execute($sql);
}

function getSummBasketByProduct(){
    getConnection();
    $sql = "SELECT productSumm FROM basket";
    return queryAll($sql);
}

function getSummBasket($getSummBasketByProduct){
    for ($i =0, $res = 0; $i < count($getSummBasketByProduct); $i++) {
        $res += $getSummBasketByProduct[$i]['productSumm'];
    }
    return $res;
}