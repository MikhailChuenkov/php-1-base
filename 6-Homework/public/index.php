<?php
include __DIR__ . '/../config/main.php';
include ENGINE_DIR . 'calculation.php';

$res1 = mathOperation($_GET['num1'],$_GET['num2'], $_GET['operation']);
$res2 = mathOperation($_POST['num1'],$_POST['num2'], $_POST['operation']);

var_dump($_POST);
include TEMPLATES_DIR . 'calcform.php';


