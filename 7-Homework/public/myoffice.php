<?php
include __DIR__ . '/../config/main.php';
include ENGINE_DIR . "base.php";
include ENGINE_DIR . "goods.php";
include ENGINE_DIR . 'db.php';
include ENGINE_DIR . 'users.php';

session_start();
$userId = $_SESSION['user_id'];

$getUserById = getUserById($userId);
$parameters = [
    'getUserById' => $getUserById,
];

render("myoffice", $parameters);