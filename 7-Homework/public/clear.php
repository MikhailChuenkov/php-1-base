<?php
include __DIR__ . '/../config/main.php';
require_once ENGINE_DIR . "autoload.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if ($_POST['id']) {
        //var_dump($_POST);
        delOrder($_POST['id']);
        delOrderProducts($_POST['id']);
        //var_dump('Заказ удален');
        //redirect("/myoffice.php");
        echo json_encode(['success' => 'ok', 'message' => 'Заказ удален']);
        exit;
    }
}
