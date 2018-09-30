<?php

function sendComment($comment){
    getConnection();
    $sql = "INSERT INTO commentsdata (comment) VALUE ('{$comment}')";
    return execute($sql);
}

function getComments(){
    getConnection();
    $sql = "SELECT * FROM commentsdata";
    return queryAll($sql);
}

