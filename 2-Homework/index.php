<?php
/**
 * Created by PhpStorm.
 * User: Питекантроп
 * Date: 10.09.2018
 * Time: 8:10
 */
/**
 * Задание 1
 */
echo "<p>-----Задание 1-----</p>";
$a = -9;
$b = 6;

if ($a >= 0 && $b >= 0) {
    echo $a - $b;
} else if ($a < 0 && $b < 0) {
    echo $a * $b;
} else if (($a < 0 && $b >= 0) || ($a >= 0 && $b < 0)) {
    echo $a + $b;
}
/**
 * Задание 3
 */
echo "<p>-----Задание 3-----</p>";

function sum ($a, $b){
    return $a + $b;
}
function subt ($a, $b){
    return $a - $b;
}
function mult ($a, $b){
    return $a * $b;
}
function divis ($a, $b){
    return $a / $b;
}
/**
 * Задание 4
 */
echo "<p>-----Задание 4-----</p>";

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "sum":
            echo sum($arg1, $arg2)."<br>";
            break;
        case "subt":
            echo subt($arg1, $arg2)."<br>";
            break;
        case "mult":
            echo mult($arg1, $arg2)."<br>";
            break;
        case "divis":
            echo divis($arg1, $arg2)."<br>";
            break;
    }
}

mathOperation(3, 5, "sum");
mathOperation(3, 5, "subt");
mathOperation(3, 5, "mult");
mathOperation(3, 5, "divis");
/**
 * Задание 6
 */
echo "<p>-----Задание 6-----</p>";

function power($val, $pow) {
    if($pow == 0){
        return 1;
    }  else if($pow > 0) {
        return ($val) * power($val, $pow - 1);
    }
}
var_dump(power(3,2));
/**
 * Задание 7
 */
echo "<p>-----Задание 7-----</p>";

$hour = date(G);
$minute = date(i);

function getTime ($a, $word) {
    if ($a == 1 || $a == 21 || $a == 31 || $a == 41 || $a == 51){
        return $word[0];
    } else if (($a >= 2 && $a <= 4) || ($a >= 22 && $a <= 24) || ($a >= 32 && $a <= 34) || ($a >= 42 && $a <= 44)||
        ($a >= 52 && $a <= 54)){
        return $word[1];
    } else if (($a == 0) || ($a >= 5 && $a <= 20) || ($a >= 25 && $a <= 30) || ($a >= 35 && $a <= 40) || ($a >= 45 &&
            $a <= 50) || ($a >= 55 && $a <= 59)){
        return $word[2];
    }
}

echo $hour." ".getTime($hour, array("час", "часа", "часов"))."  ".
    $minute." ".getTime($minute, array("минута", "минуты", "минут"));