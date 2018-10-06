<?php
include __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . "autoload.php";

$id = $_GET['id'];
$getProduct = getProduct($id);
$parameters = [
    'getProduct' => $getProduct,
];

render("product", $parameters);