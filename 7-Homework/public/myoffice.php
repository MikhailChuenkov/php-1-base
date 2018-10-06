<?php
include __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . "autoload.php";

session_start();
$userId = $_SESSION['user_id'];
$getOrdersUser = getOrdersUser($userId);
//var_dump($getOrdersUser);

$getProductByOrderId = getProductByOrderId($getOrdersUser);
//var_dump($getProductByOrderId);
$getUserById = getUserById($userId);

$parameters = [
    'getUserById' => $getUserById,
    'getProductByOrderId' => $getProductByOrderId,
];
echo json_encode(['success' => 'ok', 'message' => 'Заказ удален']);
render("myoffice", $parameters);