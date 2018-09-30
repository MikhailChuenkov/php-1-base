<?php
include __DIR__ . '/../config/main.php';
include ENGINE_DIR . "base.php";
include ENGINE_DIR . "goods.php";
include ENGINE_DIR . 'db.php';
include ENGINE_DIR . 'users.php';


$parameters = [];

render("myofficeerror", $parameters);