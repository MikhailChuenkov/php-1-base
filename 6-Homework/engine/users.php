<?php
function getUsers($login, $password){
    getConnection();
    $sql = "SELECT * FROM users WHERE login = '{$login}' AND password = '{$password}'";
    return queryOne($sql);
}

