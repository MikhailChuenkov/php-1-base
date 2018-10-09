<?php
function getUsers($login, $password){
    $sql = "SELECT * FROM users WHERE login = '{$login}' AND password = '{$password}'";
    return queryOne($sql);
}

function getUserById($id){
    $sql = "SELECT * FROM users WHERE id = '{$id}'";
    return queryOne($sql);
}

function sendUser($login, $password){
    $sql = "INSERT INTO users (login, password) VALUE ('{$login}', '{$password}')";
    return execute ($sql);
}

function getOrdersUser($userId){
    $sql = "SELECT id FROM orders WHERE idUser = '{$userId}'";
    return queryAll($sql);
}

function getProductByOrderId($getOrdersUser){
    for ($i = 0, $res = []; $i < count($getOrdersUser); $i++){
        $sql = "SELECT * FROM orderProducts WHERE orderId = '{$getOrdersUser[$i]['id']}'";
        $res[$i] = queryAll($sql);
    }
    return $res;
}
/*
function getSummOrderByProduct($getProductByOrderId)
{
    for($i = 0; $i < count($getProductByOrderId); $i++){

    }
    return $res;
}

function getSummOrder($getSummBasketByProduct)
{
    for ($i = 0, $res = 0; $i < count($getSummBasketByProduct); $i++) {
        $res += $getSummBasketByProduct[$i]['productSumm'];
    }
    return $res;
}

function getSummByOrderId($getOrdersUser){
    $sql = "SELECT productSumm FROM orderProducts WHERE orderId = '{$getOrdersUser}'";
    return queryAll($sql);
}*/
