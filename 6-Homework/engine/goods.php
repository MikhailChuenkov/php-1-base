<?php
function getGoods(){
    getConnection();
    $sql = "SELECT * FROM goodsData";
    return queryAll($sql);
}