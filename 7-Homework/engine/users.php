<?php
function getUsers($login, $password){
    getConnection();
    $sql = "SELECT * FROM users WHERE login = '{$login}' AND password = '{$password}'";
    return queryOne($sql);
}

function getUserById($id){
    getConnection();
    $sql = "SELECT * FROM users WHERE id = '{$id}'";
    return queryOne($sql);
}

function sendUser($login, $password){
    getConnection();
    $sql = "INSERT INTO users (login, password) VALUE ('{$login}', '{$password}')";
    return execute ($sql);
}
