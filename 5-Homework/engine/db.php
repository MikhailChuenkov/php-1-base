<?php
function getConnection (){
    $config = include CONFIG_DIR . "db.php";
    static $conn = null;
    if (is_null($conn)) {
        $conn = mysqli_connect($config['host'], $config['user'], $config['password'], $config['dbName']);
    }
    return $conn;
}

/**
 * Выполнение простого запроса без выборки
 * @param $sql
 * @return bool|mysqli_result
 */
function execute ($sql){
    if(!$res = mysqli_query(getConnection(), $sql)){
        var_dump(mysqli_error(getConnection()));
    }
    return $res;
}

function queryAll ($sql){
    return mysqli_fetch_all(execute($sql), MYSQLI_ASSOC);
}

function queryOne ($sql){
    return queryAll($sql)[0];
}

function closeConnection(){
    return mysqli_close(getConnection());
}